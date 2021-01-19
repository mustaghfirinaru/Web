<div class="container">

<div class="container bg-light pt-3" style="min-height:50vh;">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Your Order List</h1>
  </div>

  <div class="row">
    <div class="col">
      <h6 class="mb-0 text-gray-800">Here list of your orders. Please make payment soon in 1x24 hours.</h6>
      <table class="table table-striped">
        <tr>
          <th>No</th>
          <th>Shipping Address</th>
          <th>Order Date</th>
          <th>Payment</th>
          <th colspan="2"></th>
        </tr>
        <?php
        $var = 0;
        if (!empty($unpaid)) {
          foreach ($unpaid as $data) {
            $var = $var + 1;
            echo "<tr>
  <td>$var</td>
          <td>" . $data->shipping_add . "</td>
          <td>" . $data->orderdate . "</td>";
          if($data->payby=="BNI Bank") echo"<td>" . $data->payby . " 0910350xxx</td>";
          if($data->payby=="BRI Bank") echo"<td>" . $data->payby . " 5315119xxx</td>";
          if($data->payby=="Mandiri Bank") echo"<td>" . $data->payby . " 9000010527xxx</td>";
          if($data->payby=="Gopay") echo"<td>" . $data->payby . " 08980090xxx</td>";
          echo"
          <td align='center'><a href='" . base_url("order/detail/") . $data->idinvoice . "'><div class='btn btn-primary btn-sm'>Detail</div></a></td>
          <td align='center'><a href='" . base_url("order/cancel/") . $data->idinvoice . "'><div class='btn btn-danger btn-sm'>Cancel Order</div></a></td>
          </tr>";
          }
        } else {
          echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
        }
        ?>
      </table>

      <h6 class="mb-0 text-gray-800">Here list of your orders already paid</h6>
      <table class="table table-striped">
        <tr>
          <th>No</th>
          <th>Shipping Address</th>
          <th>Order Date</th>
          <th>Shipping date</th>
          <th>Payment</th>
        </tr>
        <?php
        $var = 0;
        if (!empty($paid)) {
          foreach ($paid as $data) {
            $var = $var + 1;
            echo "<tr>
                  <td>$var</td>
                            <td>" . $data->shipping_add . "</td>
                          <td>" . $data->orderdate . "</td>
                          <td>" . $data->selldate . "</td>";
                          if($data->payby=="BNI Bank") echo"<td>" . $data->payby . " 0910350xxx</td>";
                          if($data->payby=="BRI Bank") echo"<td>" . $data->payby . " 5315119xxx</td>";
                          if($data->payby=="Mandiri Bank") echo"<td>" . $data->payby . " 9000010527xxx</td>";
                          if($data->payby=="Gopay") echo"<td>" . $data->payby . " 08980090xxx</td>";
                          echo"
                          </tr>";
          }
        } else {
          echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
        }
        ?>
      </table>
    </div>
  </div>
</div>
</div>
