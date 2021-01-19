<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class bookmodel extends CI_Model
{
  public function booksdetail()
  {
    return $this->db->get('book')->result();
  }
  public function addnewbook()
  {
    $data = array(
      "isbn" => $this->input->post('input_isbn'),
      "title" => $this->input->post('input_title'),
      "author" => $this->input->post('input_author'),
      "publisher" => $this->input->post('input_publisher'),
      "year" => $this->input->post('input_year'),
      "weight" => $this->input->post('input_weight'),
      "lang" => $this->input->post('input_lang'),
      "category" => $this->input->post('input_category'),
      "description" => $this->input->post('input_desc'),
      "price" => $this->input->post('input_price'),
      "stock" => $this->input->post('input_stock'),
    );
    $this->db->insert('book', $data);
  }
  public function viewbookby($kode)
  {
    $this->db->where('isbn', $kode);
    return $this->db->get('book')->row();
  }
  public function editbook($kode)
  {
    if (empty($_FILES['pay']['name'])) {
      $data = array(
        "isbn" => $this->input->post('input_isbn'),
        "title" => $this->input->post('input_title'),
        "author" => $this->input->post('input_author'),
        "publisher" => $this->input->post('input_publisher'),
        "year" => $this->input->post('input_year'),
        "weight" => $this->input->post('input_weight'),
        "lang" => $this->input->post('input_lang'),
        "category" => $this->input->post('input_category'),
        "description" => $this->input->post('input_desc'),
        "price" => $this->input->post('input_price'),
        "stock" => $this->input->post('input_stock'),
      );
    }
    else{
      $data = array(
        "isbn" => $this->input->post('input_isbn'),
        "title" => $this->input->post('input_title'),
        "author" => $this->input->post('input_author'),
        "publisher" => $this->input->post('input_publisher'),
        "year" => $this->input->post('input_year'),
        "weight" => $this->input->post('input_weight'),
        "lang" => $this->input->post('input_lang'),
        "category" => $this->input->post('input_category'),
        "description" => $this->input->post('input_desc'),
        "price" => $this->input->post('input_price'),
        "stock" => $this->input->post('input_stock'),
        "image"=> $_FILES['pay']['name'],
      );
    }
    $this->db->where('isbn', $kode);
    $this->db->update('book', $data);
  }
  public function deletebook($kode)
  {
    $this->db->where('isbn', $kode);
    $this->db->delete('book');
  }
  public function addnewbookorder($kode)
  {
    $data = array(
      "isbn" => $kode,
      "quantity" => $this->input->post('quantity'),
      "address" => $this->input->post('shipping'),

      "no_order" => "O-".date("mdhis"),
      "paydate" => "Unpaid",
      "photo" => "Unpaid",
    );
    $this->db->insert('bookorder', $data);
  }
  
  public function booksorderdetail()
  {
    return $this->db->get('bookorder')->result();
  }
  
  public function deletebookorder($kode)
  {
    $this->db->where('no_order', $kode);
    $this->db->delete('bookorder');
  }
  public function viewbooorderkby($kode)
  {
    $this->db->where('no_order', $kode);
    return $this->db->get('bookorder')->row();
  }
  public function confirmbookpayment($kode)
  {
    $name       = $_FILES['pay']['name'];
    $temp_name  = $_FILES['pay']['tmp_name'];    
    $data = array(
      "no_order" => $this->input->post('input_no'),
      "isbn" => $this->input->post('input_isbn'),
      "id" => $this->input->post('input_id'),
      "quantity" => $this->input->post('input_qua'),
      "address" => $this->input->post('input_add'),
      "paydate" => $this->input->post('input_date'),
      "photo"=>$name, 
      // $this->input->post('pay'),
      
    );
    $this->db->where('no_order', $kode);
    $this->db->update('bookorder', $data);
  }
  public function booksold()
  {
    return $this->db->get('sell')->result();
  }
  function orderexists($kode)
  {
    $calctotal=$this->db->from('book');
    $this->db->where('no_order',$kode);
    $query = $this->db->get('sell');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
  }

  public function deleteconfirmedbyadmin($kode)
  {
    $this->db->where('no_struct', $kode);
    $this->db->delete('sell');
  }
  
  public function getbycategory($kode)
  {
    return $this->db->get_where("book",array('category'=>$kode));
  }
  
  public function find($kode)
  {
    $res=$this->db->where('isbn',$kode)->limit(1)->get('book');
    if($res->num_rows()>0) return $res->row();
    else array();
  }
  
  public function orderbook()
  {
    $invo=array(
      'idinvoice'=> "I".date("mdhis"),
      'order_user'=> $this->session->userdata('s_id'),
      'shipping_add'=> $this->input->post('input_add'),
      'orderdate'=> date("y-m-d h:i:s"),
      'payby'=> $this->input->post('input_pay'),
    );
    $this->db->insert('invoice',$invo);
    foreach ($this->cart->contents() as $item){
      $data = array(
        'idinvoice'=>"I".date("mdhis"),
        'isbn'=>$item['id'],
        'qty'=>$item['qty'],
      );
      $updatestok = array(
        "stock" => $this->db->where('isbn', $item['id'])->get('book')->row()->stock-$item['qty'],
      );
    $up=$this->db->where('isbn', $item['id']);
    $up=$this->db->update('book', $updatestok);
    $this->db->insert('bookorder',$data);
    }
    return TRUE;
  }
  public function getinvoice(){
    $res=$this->db->get('invoice');
    if($res->num_rows()>0){
      return $res->result();
    }
    else return false;
  }
  
  public function getpaidinvoice()
  {
    return $this->db->where('paid', TRUE)->get('invoice')->result();
  }
  public function getinvoiceprofilepaid($id)
  {
    return $this->db->where('order_user', $id)->where('paid', TRUE)->get('invoice')->result();
  }
  public function getinvoiceprofileunpaid($id)
  {
    return $this->db->where('order_user', $id)->where('paid', False)->get('invoice')->result();
  }
  
  public function getunpaidinvoice()
  {
    return $this->db->where('paid', FALSE)->get('invoice')->result();
  }
  public function getreport()
  {
    
    $this->db->select('*');
    $this->db->from('book');
    $this->db->join('bookorder','book.isbn=bookorder.isbn');
    $this->db->join('invoice','invoice.idinvoice=bookorder.idinvoice');
    $this->db->join('user','invoice.order_user=user.username');
    return $this->db->where('paid', TRUE)->get()->result();
  }
  public function getinvby($id)
  {
    $this->db->where('idinvoice', $id);
    return $this->db->get('invoice')->row();
  }
  public function getorderby($id)
  {
    return $this->db->where('idinvoice', $id)->get('bookorder')->result();
  }
  public function getorderdetailforuser($id)
  {
    $this->db->select('*');
    $this->db->from('book');
    $this->db->join('bookorder','book.isbn=bookorder.isbn');
    return $this->db->where('idinvoice', $id)->get()->result();
  }
  
  public function deleteinv($kode)
  {
    $this->db->where('idinvoice', $kode);
    $this->db->delete('bookorder');
    $this->db->where('idinvoice', $kode);
    $this->db->delete('invoice');
  }
  
  public function changetopaid($kode)
  {
    $data = array(
    "selldate" => date("y-m-d h:i:s"),
    "paid" => TRUE,
  );
  $this->db->where('idinvoice', $kode);
  $this->db->update('invoice', $data);
}
  
  public function changetounpaid($kode)
  {
    $data = array(
    "selldate" => "0000-00-00",
    "paid" => FALSE,
  );
  $this->db->where('idinvoice', $kode);
  $this->db->update('invoice', $data);
}
}
