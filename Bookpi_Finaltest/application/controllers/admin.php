<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('role')!=1){
      $this->session->set_flashdata('mess','<div class="alert alert-warning alert-dismissible fade show" role="alert">
      Please Login First
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
    
    redirect('acc/login');
    }
    $this->load->model('bookmodel');
    $this->load->model('modelacc');
  }
  public function index()
  {
      
    $data['barang'] = $this->bookmodel->booksdetail();
    $this->load->view('admin/fragment/header');
    $this->load->view('admin/fragment/sidebar');
    $this->load->view('admin/fragment/topbar');
    $this->load->view('admin/booklist',$data);
    $this->load->view('admin/fragment/footer');
  }
  public function gotobookedit($code)
  {
      
    $data['book'] = $this->bookmodel->viewbookby($code);
    $this->load->view('admin/fragment/header');
    $this->load->view('admin/fragment/sidebar');
    $this->load->view('admin/fragment/topbar');
    $this->load->view('admin/bookedit',$data);
    $this->load->view('admin/fragment/footer');
  }
  public function gotoinvoice()
  {
      
    $data['paid'] = $this->bookmodel->getpaidinvoice();
    $data['unpaid'] = $this->bookmodel->getunpaidinvoice();
    $this->load->view('admin/fragment/header');
    $this->load->view('admin/fragment/sidebar');
    $this->load->view('admin/fragment/topbar');
    $this->load->view('admin/invoice',$data);
    $this->load->view('admin/fragment/footer');
  }
  public function gotoreport()
  {
      
    $data['report'] = $this->bookmodel->getreport();
    $this->load->view('admin/fragment/header');
    $this->load->view('admin/fragment/sidebar');
    $this->load->view('admin/fragment/topbar');
    $this->load->view('admin/report',$data);
    $this->load->view('admin/fragment/footer');
  }
  
  public function gotoinvoicedetail($id)
  {
    $data['inv'] = $this->bookmodel->getinvby($id);
    $data['order'] = $this->bookmodel->getorderby($id);
    $this->load->view('admin/fragment/header');
    $this->load->view('admin/fragment/sidebar');
    $this->load->view('admin/fragment/topbar');
    $this->load->view('admin/invoicedetail',$data);
    $this->load->view('admin/fragment/footer');
    
  }
  public function deleteinv($kode)
  {
    $this->bookmodel->deleteinv($kode);
    redirect('admin/gotoinvoice');
  }
  public function changetopaid($kode)
  {
    $this->bookmodel->changetopaid($kode);
    redirect('admin/gotoinvoice');
  }
  
  public function changetounpaid($kode)
  {
    $this->bookmodel->changetounpaid($kode);
    redirect('admin/gotoinvoice');
  }
  public function export()
  {
    
    $this->load->view('admin/expotexcel');
    // redirect('admin/gotoreport');
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('admin/login');
  }

  
}