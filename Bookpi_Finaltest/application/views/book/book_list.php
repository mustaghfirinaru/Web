 <div class="col-10 ">
 <div class="row">
      <?php
      $var = 0;
      if (!empty($barang)) {
        foreach ($barang as $data) {
            $var = $var + 1;
            echo "
            <div class='card col-3 mb-1'>
            <img class='card-img-top' src=";
            echo base_url('');
            echo "uploads/$data->image  height='300px'>
                <div class='card-body'>
                  <h6 class='card-title' style='height: 80px;'>$data->title</h6>
                  <p class='card-text'>$data->author</p>
                  <p class='card-text'><small class='text-muted'>$data->year</small></p>
                  <h6 class='bg-info rounded text-light p-1 text-center'>Rp. "; echo number_format($data->price);echo"</h6>
                  <div class='row'>
                  <a class='col btn btn-primary btn-sm ml-1' href='"; echo base_url("book/detailbookeach/").$data->isbn; echo"' role='button'>Detail</a>
                  <a class='col btn btn-primary btn-sm ml-1' href='"; echo base_url("book/addcartfromlist/").$data->isbn; echo"' role='button'>Add Cart</a>
                  </div>
                  </div>
                  </div>";
                }
              }
      ?>
  </div>
</div>
</div>
</div>