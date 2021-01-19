<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Invoice List</h1>
          </div>
          
          <div class="row">
          <div class="col">
          <h4 class="h4 mb-0 text-gray-800">Waiting for payment</h4>
          <table class="table table-striped">
            <tr>
              <th>No</th>
              <th>Id Invoice</th>
              <th>Name</th>
              <th>Shipping Address</th>
              <th>Order Date</th>
              <th>Payment</th>
              <th></th>
            </tr>
            <?php
            $var = 0;
            if (!empty($unpaid)) {
              foreach ($unpaid as $data) {
  $var = $var + 1;
  echo "<tr>
  <td>$var</td>
  <td>" . $data->idinvoice . "</td>
  <td>" . $data->order_user . "</td>
          <td>" . $data->shipping_add . "</td>
          <td>" . $data->orderdate . "</td>
          <td>" . $data->payby . "</td>
          <td align='center'><a href='" . base_url("admin/gotoinvoicedetail/") .$data->idinvoice . "'><div class='btn btn-primary btn-sm'>Detail</div></a>
          <a href='" . base_url("admin/changetopaid/") .$data->idinvoice . "'><div class='btn btn-success btn-sm'>Confirm</div></a>
          <a href='" . base_url("admin/deleteinv/") .$data->idinvoice . "'><div class='btn btn-danger btn-sm'>Cancel</div></a></td>
          </tr>";
        }
      } else {
        echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
      }
            ?>
          </table>

            <h4 class="h4 mb-0 text-gray-800">Already Paid</h4>
            <table class="table table-striped">
              <tr>
                <th>No</th>
                <th>Id Invoice</th>
                <th>User</th>
                <th>Shipping Address</th>
                <th>Order Date</th>
                <th>Sell Date</th>
                <th>Payment</th>
                <th></th>
              </tr>
              <?php
            $var = 0;
            if (!empty($paid)) {
              foreach ($paid as $data) {
                  $var = $var + 1;
                  echo "<tr>
                  <td>$var</td>
                  <td>" . $data->idinvoice . "</td>
                  <td>" . $data->order_user . "</td>
                            <td>" . $data->shipping_add . "</td>
                          <td>" . $data->orderdate . "</td>
                          <td>" . $data->selldate . "</td>
                          <td>" . $data->payby . "</td>
                          <td><a href='" . base_url("admin/changetounpaid/") .$data->idinvoice . "'><div class='btn btn-warning btn-sm'>Cancel Shipping</div></a></td>
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