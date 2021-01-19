<!DOCTYPE html>
<html>
  <head>
    <title>List Book - Admin</title>
  </head>
  <body>
    <h1>Book Order List</h1>
    <a href='<?php echo base_url(); ?>'>Home</a><br><br>
    <h3>Order need payment</h3>
    <table border="1" cellpadding="5">
      <tr>
        <th>No</th>
        <th>No Order</th>
        <th>ISBN</th>
        <th>ID Buyer</th>
        <th>Quantity</th>
        <th>Address</th>
        <th colspan="3"></th>
      </tr>
      <?php
      $var=0;
      if( ! empty($barang)){ 
        foreach($barang as $data){
          if($data->photo=="Unpaid"){

            $var=$var+1;
            echo "<tr>
            <td>$var</td>
            <td>".$data->no_order."</td>
            <td>".$data->isbn."</td>
            <td>".$data->id."</td>
            <td>".$data->quantity."</td>
            <td>".$data->address."</td>
            <td><a href='".base_url("book/confirmbookpayment/".$data->no_order)."'>Confirm Payment</a></td>
            <td><a href='".base_url("book/deletebookorder/".$data->no_order)."'>Cancel Order</a></td>
            </tr>";
          }
        }
      }else{ 
        echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
      }
      ?>
    </table>
    <h3>Order already paid</h3>
    <table border="1" cellpadding="5">
      <tr>
        <th>No</th>
        <th>No Order</th>
        <th>ISBN</th>
        <th>ID Buyer</th>
        <th>Quantity</th>
        <th>Address</th>
        <th>Paydate</th>
        <th>Payment</th>
        <th>---</th>
      </tr>
      <?php
      $var=0;
      if( ! empty($barang)){ 
        foreach($barang as $data){
          if($data->photo!="Unpaid"){

            $var=$var+1;
            echo "<tr>
            <td>$var</td>
            <td>".$data->no_order."</td>
            <td>".$data->isbn."</td>
            <td>".$data->id."</td>
            <td>".$data->quantity."</td>
            <td>".$data->address."</td>
            <td>".$data->paydate."</td>
            <td><img src='".base_url()."/uploads/$data->photo' width='200'></td>
            <td><a href='".base_url("book/confirmbookpayment/".$data->no_order)."'>Confirm Payment</a></td>
            </tr>";
          }
        }
      }else{ 
        echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
      }
      ?>
    </table>
    <!-- <a href='<?php echo base_url("barang/lihatjual"); ?>'>Lihat Data Penjualan</a><br><br> -->
  </body>
</html>