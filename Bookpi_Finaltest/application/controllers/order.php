<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class order extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('bookmodel');
    if($this->session->userdata('role')!=2){
      $this->session->set_flashdata('mess','<div class="alert alert-warning alert-dismissible fade show" role="alert">
      Please Login First to Continue Shopping
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    
    redirect('acc/login');
    }
  }
  
  
  public function gotoorder()
  {
    $data['title'] = "Order Book";
    $this->load->view('book/fragment/header',$data);
    $this->load->view('book/order');
    $this->load->view('book/fragment/footer');
  }
  public function order()
  {
    $data = $this->bookmodel->orderbook();
    $this->cart->destroy();
    $titel['title'] = "OrderSuccess";
    $this->load->view('book/fragment/header',$titel);
    $this->load->view('book/ordersucc');
    $this->load->view('book/fragment/footer');
  }
  
  public function profile($kode)
  {
    $data['paid'] = $this->bookmodel->getinvoiceprofilepaid($kode);
    $data['unpaid'] = $this->bookmodel->getinvoiceprofileunpaid($kode);
    $titelpage['title'] = "Profile";
    $this->load->view('book/fragment/header',$titelpage);
    $this->load->view('book/profile',$data);
    $this->load->view('book/fragment/footer');
  }
  public function detail($kode)
  {
    $data['order'] = $this->bookmodel->getorderdetailforuser($kode);
    $titelpage['title'] = "Order Detail";
    $this->load->view('book/fragment/header',$titelpage);
    $this->load->view('book/detailprofile',$data);
    $this->load->view('book/fragment/footer');
  }
  
  public function cancel($kode)
  {
    $this->bookmodel->deleteinv($kode);
    redirect('order/profile/'.$this->session->userdata('s_id'));
  }
  
}
