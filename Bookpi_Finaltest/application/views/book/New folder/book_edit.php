<html><head>
  <title>Form Ubah - CRUD Codeigniter</title>
  </head><body>
  <h1>Form Ubah Barang</h1>
  <hr>
  <!-- Menampilkan Error jika validasi tidak valid -->
  <div style="color: red;"><?php echo validation_errors(); ?></div>
  <?php echo form_open_multipart("book/editbook/" . $book->isbn);?>
  <table cellpadding="8">
  <tr><td>ISBN</td><td><input type="text" name="input_isbn" value="<?php echo set_value('input_isbn', $book->isbn);?>"></td></tr>
    <tr><td>Title</td><td><input type="text" name="input_title" value="<?php echo set_value('input_title', $book->title);?>"></td></tr>
    <tr><td>Author</td><td><input type="text" name="input_author" value="<?php echo set_value('input_author', $book->author);?>"></td></tr>
    <tr><td>Publisher</td><td><input type="text" name="input_publisher" value="<?php echo set_value('input_publisher', $book->publisher);?>"></td></tr>
    <tr><td>Year</td><td><input type="text" name="input_year" value="<?php echo set_value('input_year', $book->year);?>"></td></tr>
    <tr><td>Weight</td><td><input type="text" name="input_weight" value="<?php echo set_value('input_weight', $book->weight);?>"></td></tr>
    <tr><td>Language</td><td>
    <select name="input_lang">
      <option <?php if ($book->lang=="Indonesia")echo'selected';?> value="Indonesia">Indonesia</option>
      <option <?php if ($book->lang=="English")echo'selected';?> value="English">English</option>
    </select>
    <tr><td>Category</td><td>
    <select name="input_category" value="<?php echo set_value('input_category', $book->category);?>">
      <option <?php if ($book->category=="School")echo'selected';?> value="School">School</option>
      <option <?php if ($book->category=="Science")echo'selected';?> value="Science">Science</option>
      <option <?php if ($book->category=="Novel")echo'selected';?> value="Novel">Novel</option>
    </select></td></tr>
    <tr><td>Description</td><td><textarea name="input_desc" value=""><?php echo set_value('input_desc', $book->description);?></textarea></td></tr>
    <tr><td>Price</td><td><input type="text" name="input_price" value="<?php echo set_value('input_price', $book->price);?>"></td></tr>
    <tr><td>Stock</td><td><input type="text" name="input_stock" value="<?php echo set_value('input_stock', $book->stock);?>"></td></tr>
    <tr><td>Cover</td><td><input name="pay" type="file" value="<?php echo set_value('input_stock', $book->image);?>"></td></tr>
    <tr>
  </table>  <hr>
  <input type="submit" name="submit" value="Edit">
  <a href="<?php echo base_url("book/book_list"); ?>"><input type="button" value="Cancel"></a>
  <?php echo form_close(); ?>
</body></html>