<html><head>
  <title>Form Ubah - CRUD Codeigniter</title>
  </head><body>
  <h1>Book Add Order</h1>
  <hr>
  <!-- Menampilkan Error jika validasi tidak valid -->
  <div style="color: red;"><?php echo validation_errors(); ?></div>
  <?php echo form_open("book/orderbook/" . $book->isbn); ?>
  <table cellpadding="8">
    <tr><td>Title</td><td><?php echo $book->title;?></td></tr>
    <tr><td>Author</td><td><?php echo $book->author;?></td></tr>
    <tr><td>Price</td><td><?php echo  $book->price;?></td></tr>
    <tr><td>Stock</td><td><?php echo  $book->stock;?></td></tr>
    <tr><td>Quantity</td><td><input type="text" name="quantity" value=""></td></tr>
    <tr><td>Shipping Address</td><td><input type="text" name="shipping" value=""></td></tr>
    <tr>
  </table>  <hr>
  <input type="submit" name="submit" value="Order">
  <a href="<?php echo base_url("book/detailbookeach/". $book->isbn); ?>"><input type="button" value="Cancel"></a>
  <?php echo form_close(); ?>
</body></html>