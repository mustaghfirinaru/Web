<html><head>
  <title>Form Add Book - Admin</title>
  </head><body>
  <h1>Form Add New Book</h1>
  <hr>
  <!-- <div style="color: red;"><?php echo validation_errors(); ?></div> -->
  <?php echo form_open_multipart("book/addbook/");?>
  <table cellpadding="8">
    <tr><td>ISBN</td><td><input type="text" name="input_isbn" value=""></td></tr>
    <tr><td>Title</td><td><input type="text" name="input_title" value=""></td></tr>
    <tr><td>Author</td><td><input type="text" name="input_author" value=""></td></tr>
    <tr><td>Publisher</td><td><input type="text" name="input_publisher" value=""></td></tr>
    <tr><td>Year</td><td><input type="text" name="input_year" value=""></td></tr>
    <tr><td>Weight</td><td><input type="text" name="input_weight" value=""></td></tr>
    <tr><td>Language</td><td>
    <select name="input_lang">
      <option value="Indonesia">Indonesia</option>
      <option value="English">English</option>
    </select>
    <tr><td>Category</td><td>
    <select name="input_category">
      <option value="School">School</option>
      <option value="Science">Science</option>
      <option value="Novel">Novel</option>
    </select></td></tr>
    <tr><td>Description</td><td><textarea name="input_desc" value=""></textarea></td></tr>
    <tr><td>Price</td><td><input type="text" name="input_price" value=""></td></tr>
    <tr><td>Stock</td><td><input type="text" name="input_stock" value=""></td></tr>
    <tr><td>Cover</td><td><input name="pay" type="file"></td></tr>
    
  </table>  <hr>
  <input type="submit" name="submit" value="Save">
  <a href="<?php echo base_url("book/book_list"); ?>"><input type="button" value="Cancel"></a>
  <?php echo form_close(); ?>
</body></html>