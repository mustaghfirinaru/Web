<html><head>
  <title>Form Ubah - CRUD Codeigniter</title>
  </head><body>
  <h1>Book Confirm Payment</h1>
  <hr>
  <!-- Menampilkan Error jika validasi tidak valid -->
  <div style="color: red;"><?php echo validation_errors(); ?></div>
  
  <!-- <?php echo $error;?> -->
  <?php echo form_open_multipart("book/confirmbookpayment/" . $order->no_order);?>
  <table cellpadding="8">
    <tr><td>No Order</td><td><input type="text" name="input_no" value="<?php echo set_value('input_no', $order->no_order);?>"></td></tr>
    <tr><td>ISBN</td><td><input type="text" name="input_isbn" value="<?php echo set_value('input_isbn', $order->isbn);?>"></td></tr>
    <tr><td>ID Buyer</td><td><input type="text" name="input_id" value="<?php echo set_value('input_id', $order->id);?>"></td></tr>
    <tr><td>Quantity</td><td><input type="text" name="input_qua" value="<?php echo set_value('input_qua', $order->quantity);?>"></td></tr>
    <tr><td>Shipping Address</td><td><input type="text" name="input_add" value="<?php echo set_value('input_add', $order->address);?>"></td></tr>
    <tr><td>Paydate</td><td><input type="date" name="input_date" value="<?php echo set_value('input_date', $order->paydate);?>"></td></tr>
    <tr><td>Payment Evidence</td><td><input name="pay" type="file"></td></tr>
    <tr>
  </table>  <hr>
  <input type="submit" name="submit" value="Order">
  <a href="<?php echo base_url("book/book_olist/"); ?>"><input type="button" value="Cancel"></a>
  <?php echo form_close(); ?>
</body></html>