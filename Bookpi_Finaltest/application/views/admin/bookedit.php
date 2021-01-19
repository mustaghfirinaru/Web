<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Book Edit</h1>
  </div>
  <!-- Project Card Example -->
  <?php echo form_open_multipart("book/editbook/" . $book->isbn); ?>
  <div class="modal-body">
    <!-- <div class="form-group col-md-6">
      <label for=""inputPassword" class="col-sm-2 col-form-label">Password<div class="col-sm-4"><input type="password" value="<?php echo set_value('input_isbn', $book->isbn); ?>"> id="inputPassword" placeholder="Password"</div> -->
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="" input_isbn" class="col-sm-2 col-form-label">ISBN</label>
        <input type="text" class="form-control" name="input_isbn" value="<?= set_value('input_isbn', $book->isbn); ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="input_title" class="col-sm-2 col-form-label">Title</label>
        <input type="text" class="form-control" name="input_title" value="<?php echo set_value('input_title', $book->title); ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="" input_author" class="col-sm-2 col-form-label">Author</label>
        <input type="text" class="form-control" name="input_author" value="<?php echo set_value('input_author', $book->author); ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="input_publisher" class="col-sm-2 col-form-label">Publisher</label>
        <input type="text" class="form-control" name="input_publisher" value="<?php echo set_value('input_publisher', $book->publisher); ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="" input_year" class="col-sm-2 col-form-label">Year</label>
        <input type="text" class="form-control" name="input_year" value="<?php echo set_value('input_year', $book->year); ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="input_weight" class="col-sm-2 col-form-label">Weight</label>
        <input type="text" class="form-control" name="input_weight" value="<?php echo set_value('input_weight', $book->weight); ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="" input_lang">Language</label>
        <select name="input_lang" class="form-control">
          <option <?php if ($book->lang == "Indonesia") echo 'selected'; ?> value="Indonesia">Indonesia</option>
          <option <?php if ($book->lang == "English") echo 'selected'; ?> value="English">English</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="input_category">Category</label>
        <select name="input_category" class="form-control">
          <option <?php if ($book->category == "School") echo 'selected'; ?> value="School">School</option>
          <option <?php if ($book->category == "Science") echo 'selected'; ?> value="Science">Science</option>
          <option <?php if ($book->category == "Novel") echo 'selected'; ?> value="Novel">Novel</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for=input_price" class="col-sm-2 col-form-label">Price</label>
        <input type="text" class="form-control" name="input_price" value="<?php echo set_value('input_price', $book->price); ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="input_stock" class="col-sm-2 col-form-label">Stock</label>
        <input type="text" class="form-control" name="input_stock" value="<?php echo set_value('input_stock', $book->stock); ?>">
      </div>
    </div>
      <div class="form-row">
    <div class="form-group col-md-10">
      <label for="" input_desc" class=" col-form-label">Description</label>
      <textarea name="input_desc" class="form-control" rows="7"><?php echo set_value('input_desc', $book->description); ?></textarea>
      <div class="form-group">
        <label for="pay" class="col-form-label">Cover</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="pay" id="customFile">
          <label class="custom-file-label" for="customFile" aria-describedby="customFile"><?php echo $book->image;?></label>
        </div> 
      </div>
    </div>
         <img src='<?php echo  base_url();echo  "/uploads/"; echo $book->image;?>'class="col-md-2" >
    </div>
    <a href="<?php echo base_url("admin/gotobooklist"); ?>">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </a>
  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
</div>
</div>
<!-- /.container-fluid -->