<div class="container">
  <div class="container rounded mb-2 bg-gradient-light  p-5">
    <div class="row">
      <div class="col-md-3">
        <img src="<?php echo base_url(''); ?>uploads/978-0735213616.jpg" class="rounded img-fluid" alt="">
      </div>
      <div class="col-md-9">
        <h1 class="display-4">Latest Book</h1>
        <p class="lead"><?php echo $promo->title; ?></p>
        <p>by <?php echo $promo->author; ?></p>
        <a class=" bg-info rounded text-light p-2 "> Rp. <?php echo number_format($promo->price); ?></a>
        <!-- <h5 class="bg-info rounded text-light p-1 text-center hover"> Rp.<?php echo number_format($promo->price); ?></h5> -->
        <hr class="my-1">
        <p><?php echo substr($promo->description, 0, 400);
            echo " . . ."; ?></p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="<?php echo base_url("book/detailbookeach/") . $promo->isbn; ?>" role="button">See Detail</a>
          <a class="btn btn-primary btn-lg" href="<?php echo base_url("book/addcart/") . $promo->isbn; ?>" role="button">Add to Cart</a>
        </p>
      </div>
    </div>
  </div>
  <div class="container bg-gradient-light p-5 mb-2">
    <h3 class="pl-2">Category</h3>
    <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
      <li class="nav-item col">
        <a class="nav-link active text-center" id="pills-science-tab" data-toggle="pill" href="#pills-science" role="tab" aria-controls="pills-science" aria-selected="true">Science</a>
      </li>
      <li class="nav-item col">
        <a class="nav-link text-center" id="pills-novel-tab" data-toggle="pill" href="#pills-novel" role="tab" aria-controls="pills-novel" aria-selected="false">School</a>
      </li>
      <li class="nav-item col">
        <a class="nav-link text-center" id="pills-school-tab" data-toggle="pill" href="#pills-school" role="tab" aria-controls="pills-school" aria-selected="false">Novel</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-science" role="tabpanel" aria-labelledby="pills-science-tab">
        <div class="card-deck">
          <?php
          $var = 0;
          if (!empty($barang)) {
            foreach ($barang as $data) {
              if ($data->category == "Science") {
                $var = $var + 1;
                echo "
              <div class='card'>
              <img class='card-img-top' src=";
                echo base_url('');
                echo "uploads/$data->image alt='Card image cap' '>
              <div class='card-body'>
              <h5 class='card-title'style='height: 80px;'>$data->title</h5>
              <p class='card-text'>$data->author</p>
              <p class='card-text'><small class='text-muted'>$data->year</small></p>
              
              <h6 class='bg-info rounded text-light p-1 text-center'>Rp. ";
                echo number_format($data->price);
                echo "</h6>
              <div class='row'>
                    <a class='col btn btn-primary btn-sm ml-1' href='book/detailbookeach/$data->isbn' role='button'>Detail</a><a class='col btn btn-primary btn-sm ml-1' href='book/addcart/$data->isbn' role='button'>Add Cart</a>
                    </div>
                    </div>
                    </div>";
              }
              if ($var == 5) break;
            }
          }
          ?>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-novel" role="tabpanel" aria-labelledby="pills-novel-tab">
        <div class="card-deck">
          <?php
          $var = 0;
          if (!empty($barang)) {
            foreach ($barang as $data) {
              if ($data->category == "School") {
                $var = $var + 1;
                echo "
              <div class='card'>
              <img class='card-img-top' src=";
                echo base_url('');
                echo "uploads/$data->image alt='Card image cap' '>
              <div class='card-body'>
              <h5 class='card-title'style='height: 80px;'>$data->title</h5>
              <p class='card-text'>$data->author</p>
              <p class='card-text'><small class='text-muted'>$data->year</small></p>
              <h6 class='bg-info rounded text-light p-1 text-center'>Rp. ";
                echo number_format($data->price);
                echo "</h6>
              <div class='row'>
              <a class='col btn btn-primary btn-sm ml-1' href='book/detailbookeach/$data->isbn' role='button'>Detail</a>
              <a class='col btn btn-primary btn-sm ml-1' href='#' role='button'>Add Cart</a>
              </div>
              </div>
              </div>";
              }
              if ($var == 5) break;
            }
          }
          ?>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-school" role="tabpanel" aria-labelledby="pills-school-tab">
        <div class="card-deck">
          <?php
          $var = 0;
          if (!empty($barang)) {
            foreach ($barang as $data) {
              if ($data->category == "Novel") {
                $var = $var + 1;
                echo "
              <div class='card'>
              <img class='card-img-top' src=";
                echo base_url('');
                echo "uploads/$data->image alt='Card image cap' '>
                  <div class='card-body'>
                    <h5 class='card-title' style='height: 80px;'>$data->title</h5>
                    <p class='card-text'>$data->author</p>
                    <p class='card-text'><small class='text-muted'>$data->year</small></p>
                    
                  <h6 class='bg-info rounded text-light p-1 text-center'>Rp. ";
                echo number_format($data->price);
                echo "</h6>
                    <div class='row'>
                    <a class='col btn btn-primary btn-sm ml-1' href='book/detailbookeach/$data->isbn' role='button'>Detail</a>
                    <a class='col btn btn-primary btn-sm ml-1' href='book/addcart/$data->isbn' role='button'>Add Cart</a>
                    </div>
                    </div>
                    </div>";
              }
              if ($var == 5) break;
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="container bg-light p-5">
    <h3 class="pl-2">Testimony</h3>
  </div> -->
</div>