<div class="container">

  <div class="container bg-light pt-3" style="min-height:50vh;">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
    </div>
    <!-- Project Card Example -->
    <div class="row">
    </div>
    <table class="table table-striped table-hover">
      <tr>
        <th>No</th>
        <th>Book Title</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
      <?php
      $var = 0;
      $sum = 0;
      if (!empty($order)) {
        foreach ($order as $data) {
          $var = $var + 1;
          $sum=$sum+$data->price*$data->qty;
          echo "<tr>
          <td>$var</td>
          <td>" . $data->title . "</td>
          <td>" . $data->qty . "</td>
          <td align='right'>Rp " .number_format($data->price*$data->qty) . "</td>
          
          </tr>";
        }
        echo "<tr><td colspan='4' align='right'>Rp " .number_format($sum). "</td></tr>";
      } else {
        echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
      }
      ?>
    </table><a href='<?php echo base_url('order/profile/'.$this->session->userdata('s_id')) ?>'><div class='btn btn-primary btn-sm'>Back</div></a></td>

  </div>
</div>