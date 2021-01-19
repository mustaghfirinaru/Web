<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Invoice List</h1>
          </div>
          <!-- Project Card Example -->
          <div class="row">
            <div class="col">
              Name : <?php echo $inv->order_user?>
              Order Date : <?php echo $inv->orderdate ?>
              Payment : <?php echo $inv->payby ?>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <tr>
              <th>No</th>
              <th>ISBN</th>
              <th>Quantity</th>
            </tr>
            <?php
            $var = 0;
            if (!empty($order)) {
              foreach ($order as $data) {
                $var = $var + 1;
                echo "<tr>
          <td>$var</td>
          <td>" . $data->isbn . "</td>
          <td>" . $data->qty . "</td>
          </tr>";
              }
            } else {
              echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
            }
            ?>
          </table>
          </table>

        </div>