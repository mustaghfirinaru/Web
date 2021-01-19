<div class="container">
  <div class="container bg-gradient-light p-3">

    <h3>Book Detail</h3>
    <hr>
    <!-- Menampilkan Error jika validasi tidak valid -->
    <div style="color: red;"><?php echo validation_errors(); ?></div>
    <?php echo form_open("book/gotoorder/" . $book->isbn); ?>
    <div class="ml-2 row">
      <img src='<?php echo  base_url();
                echo  "/uploads/";
                echo $book->image; ?>' class="col-md-3">
      <div class="col">
        <div class="row">
          <h3 class="col"><?php echo $book->title; ?></h3>
        </div>

        <div class=" bg-info rounded text-light p-2 m-2 "> Rp. <?php echo number_format($book->price); ?></div>
        <div class="row">
          <h6 class="col"><?php echo $book->year; ?></h6>
        </div>
        <div class="row">
          <h5 class="col">by <?php echo $book->author; ?></h5>
        </div>
        <div class="row">
          <h6 class="col text-justify"><?php echo $book->description; ?></h6>
        </div>

        <div class="row mb-4 ml-3 mr-3 mt-3">
          <a class='col btn btn-primary btn-md ml-1' href='<?php echo base_url("book/buynow/") . $book->isbn; ?>' role='button'>Buy Now</a>
          <a class='col btn btn-primary btn-md ml-1' href='<?php echo base_url("book/addcart/") . $book->isbn; ?>' role='button'>Add to Cart</a>
        </div>
      </div>
    </div>
    <div class="col mt-3 ml-3 mb-5">
      <div class="row">
        <h5 class="col text-bold ">Book Details : </h5>
      </div>
      <div class="row">
        <div class="col-1">ISBN</div>:<div class="col"><?php echo $book->isbn; ?></div>
      </div>
      <div class="row">
        <div class="col-1">Publisher</div>:<div class="col"><?php echo $book->publisher; ?></div>
      </div>
      <div class="row">
        <div class="col-1">Weight</div>:<div class="col"><?php echo $book->weight; ?></div>
      </div>
      <div class="row">
        <div class="col-1">Language</div>:<div class="col"><?php echo $book->lang; ?></div>
      </div>
      <div class="row">
        <div class="col-1">Category</div>:<div class="col"><?php echo $book->category; ?></div>
      </div>
      <div class="row">
        <div class="col-1">Stock</div>:<div class="col"><?php echo $book->stock; ?></div>
      </div>
    </div>
    <?php echo form_close(); ?>

  </div>
</div>