<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class book extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('bookmodel');
  }
  public function index()
  {
    $data['barang'] = $this->bookmodel->booksdetail();
    $data['promo'] = $this->bookmodel->viewbookby("978-0735213616");
    $data['title'] = "Welcome to Bookπ - Online Book Store";
    $this->load->view('book/fragment/header',$data);
    $this->load->view('book/index',$data);
    $this->load->view('book/fragment/footer');
    // $this->load->view('book/index', $data);
  }
  public function addbook()
  {
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = '*';
    $config['max_size']             = 10000;
    $config['max_width']            = 10000;
    $config['max_height']           = 10000;
    $this->load->library('upload', $config);
    $this->upload->do_upload('pay');
    $this->bookmodel->addnewbook();
    redirect('admin/gotobooklist');
   }
  public function editbook($kode)
  {
    if (!empty($_FILES['pay']['name'])) {
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = '*';
      $config['max_size']             = 10000;
      $config['max_width']            = 10000;
      $config['max_height']           = 10000;
      $config['overwrite'] = TRUE;
      $this->load->library('upload', $config);
      $this->upload->do_upload('pay');
    }
    $this->bookmodel->editbook($kode);
    redirect('admin/gotobooklist');
  }
  public function deletebook($kode)
  {
    $this->bookmodel->deletebook($kode);
    redirect('admin/gotobooklist');
  }
  public function book_list()
  {
    $data['barang'] = $this->bookmodel->booksdetail();
    
    $data['title'] = "List of Books";
    $this->load->view('book/fragment/header',$data);
    $this->load->view('book/fragment/sidebar');
    $this->load->view('book/book_list', $data);
    $this->load->view('book/fragment/footer');
  }
  public function book_listcate($kode)
  {
    $data['barang'] = $this->bookmodel->getbycategory($kode)->result();
    $data['title'] = "List of ".$kode." Books";
    $this->load->view('book/fragment/header',$data);
    $this->load->view('book/fragment/sidebar');
    $this->load->view('book/book_list', $data);
    $this->load->view('book/fragment/footer');
  }
  public function detailbookeach($kode)
  {
    $data['book'] = $this->bookmodel->viewbookby($kode);
    $data['title'] = "Detail ".$this->bookmodel->viewbookby($kode)->title;
    $this->load->view('book/fragment/header',$data);
    $this->load->view('book/book_detail', $data);
    $this->load->view('book/fragment/footer');
  }
  public function orderbook($kode)
  {
    
    if ($this->input->post('submit')) {
      // if ($this->modelbarang->validation("save")) {
        $this->bookmodel->addnewbookorder($kode);
        redirect('book/book_olist');
      // }
    }
    // $data['book'] = $this->bookmodel->viewbookby($kode);
    // $this->load->view('book/book_order_list',$data);
  }
  // public function book_olist()
  // {
  //   $data['barang'] = $this->bookmodel->booksorderdetail();
  //   $this->load->view('book/book_olist', $data);
  // }
  // public function deletebookorder($kode)
  // {
  //   $this->bookmodel->deletebookorder($kode);
  //   redirect('book/book_olist');
  // }
  // public function confirmbookpayment($kode)
  // {//Buyer Confirm payment by uploading image
  //   if ($this->input->post('submit')) {
      
  //       $config['upload_path']          = './uploads/';
  //       $config['allowed_types']        = '*';
  //       $config['max_size']             = 10000;
  //       $config['max_width']            = 10000;
  //       $config['max_height']           = 10000;
  //       $this->load->library('upload', $config);
  //       $this->upload->do_upload('pay');
  //       $this->bookmodel->confirmbookpayment($kode);
  //       redirect('book/book_olist');
  //     // }
  //   }
  //   $data['order'] = $this->bookmodel->viewbooorderkby($kode);
  //   $this->load->view('book/book_confirm_payment', $data);
  // }
  // public function book_order_confirm($kode)
  // {
  //   $data['order'] = $this->bookmodel->viewbooorderkby($kode);
  //   $this->load->view('book/book_confirm_payment', $data);
  // }
  
  // public function book_paid_list()
  // {
  //   $data['barang'] = $this->bookmodel->booksorderdetail();
  //   // $this->load->view('book/book_paid_list', $data);
  //   $data['sold'] = $this->bookmodel->booksold();
  //   $this->load->view('book/book_paid_list', $data);
  // }
  // public function confirmbookpaymentbyadmin($kode)
  // {
  //   $data['order'] = $this->bookmodel->viewbooorderkby($kode);
  //   if($this->bookmodel->orderexists($kode)){

  //   }
  //   else{
  //     $this->bookmodel->thisbookalreadypaid($kode);
  //   }
  //   redirect('book/book_paid_list');
  // }
  // public function deleteconfirmedbyadmin($kode)
  // {
  //   $this->bookmodel->deleteconfirmedbyadmin($kode);
  //   redirect('book/book_paid_list');
  // }
  
  public function addcart($kode)
  {
    $book=$this->bookmodel->find($kode);
    $data = array(
      'id'      => $book->isbn,
      'qty'     => 1,
      'price'   => $book->price,
      'name'    => $book->title,
    );
    $this->cart->insert($data);
    redirect('book');
  }
  public function addcartfromlist($kode)
  {
    $book=$this->bookmodel->find($kode);
    $data = array(
      'id'      => $book->isbn,
      'qty'     => 1,
      'price'   => $book->price,
      'name'    => $book->title,
    );
    $this->cart->insert($data);
    redirect('book/book_list');
  }
  
  public function cartdetail()
  {
    $data['title'] = "Cart List";
    $this->load->view('book/fragment/header',$data);
    $this->load->view('book/cart');
    $this->load->view('book/fragment/footer');
  }
  public function deletecart()
  {
    $this->cart->destroy();
    redirect('book');
  }
  
  
  public function buynow($kode)
  {
    $this->cart->destroy();
    $book=$this->bookmodel->find($kode);
    $data = array(
      'id'      => $book->isbn,
      'qty'     => 1,
      'price'   => $book->price,
      'name'    => $book->title,
    );
    $this->cart->insert($data);
    redirect('book/cartdetail');
  }
  
  
  
  public function changetorupiah()
  {
    foreach ($this->bookmodel->booksdetail() as $item){
      $updatestok = array(
        "price" => $this->db->where('isbn', $item->isbn)->get('book')->row()->price*15000,
      );
    $up=$this->db->where('isbn', $item->isbn);
    $up=$this->db->update('book', $updatestok);
    }
  }
}
