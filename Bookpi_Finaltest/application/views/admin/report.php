<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Report</h1>
            <a href="<?php echo base_url("admin/export"); ?>"
            <button class="btn btn-sm btn-primary mb-3">Export to Excel</button></a>
          </div>
          <!-- Project Card Example -->
          <table class="table table-striped">
            <tr>
              <th>No</th>
              <th>Book Title</th>
              <th>Buyer</th>
              <th>Email</th>
              <th>Order Date</th>
              <th>Sell Date</th>
              <th>Quantity</th>
              <th>Total</th>
              </tr>
            <?php
            $var = 0;
            $total=0;
            if (!empty($report  )) {
              foreach ($report as $data) {
                $var = $var + 1;
                $total=$total+$data->qty*$data->price;
                echo "<tr>
          <td>$var</td>
          <td>" . $data->title . "</td>
          <td>" . $data->name . "</td>
          <td>" . $data->email . "</td>
          <td>" . $data->orderdate . "</td>
          <td>" . $data->selldate . "</td>
          <td>" . $data->qty . "</td>
          <td align='right'>Rp. " . number_format($data->qty*$data->price) . "</td>
          </tr>";
        }
        echo "
        <tr><tr/>
        <td>  Earn  </td>
        <td align='right'colspan='7'>  Rp "; echo number_format($total); echo "  </td>";
      } else {
        echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
      }
            ?>
          </table>

        </div>