<div class="container ">
<div class="container bg-gradient-light pt-3" style="min-height:50vh;">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order Book</h1>
  </div>
  <div class="btn btn-md btn-success">
  <?php
  $total=0;
  if($cart=$this->cart->contents()){
    foreach($cart as $item){
      $total=$total+$item['subtotal'];
    }
    echo "Total : Rp ".number_format($total);
  }
  ?>
  </div>
  <?php echo form_open_multipart("order/order/"); ?>

  <div class="form-row">
    <div class="form-group col">
      <label for="input_add" class="col-form-label" >Shipping Address</label>
      <textarea class="form-control" name="input_add" ><?php echo $this->session->userdata('s_add'); ?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="form-group col">
      <label for="input_pay" class="col-sm-2 col-form-label">Payment</label>
      <select name="input_pay" class="form-control">
        <option value="BNI Bank">BNI 0910350xxx</option>
        <option value="BRI Bank">BRI 5315119xxx</option>
        <option value="Mandiri Bank">Mandiri 9000010527xxx</option>
        <option value="Gopay">Gopay 08980090xxx</option>
      </select></div>
  </div>
  <a href="<?php echo base_url("book/cartdetail"); ?>">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </a>
  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
</div>
</div>
<!-- /.container-fluid -->
