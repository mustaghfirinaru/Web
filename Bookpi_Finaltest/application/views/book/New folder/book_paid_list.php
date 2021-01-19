<!DOCTYPE html>
<html>
  <head>
    <title>List Book - Admin</title>
  </head>
  <body>
    <h1>Book Order List</h1>
    <a href='<?php echo base_url(); ?>'>Home</a><br><br>
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
          if($data->photo!="Kosong"){

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
            <td><a href='".base_url("book/confirmbookpaymentbyadmin/".$data->no_order)."'>Confirm Payment</a></td>
            </tr>";
          }
        }
      }else{ 
        echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
      }
      ?>
    </table>
    <h3>Book already sold</h3>
    <table border="1" cellpadding="5">
      <tr>
        <th>No</th>
        <th>No Struct</th>
        <th>No Order</th>
        <th>Selldate</th>
        <th>Total Earn</th>
        <th>---</th>
      </tr>
      <?php
      $var=0;
      if( ! empty($sold)){ 
        foreach($sold as $data){
            $var=$var+1;
            echo "<tr>
            <td>$var</td>
            <td>".$data->no_struct."</td>
            <td>".$data->no_order."</td>
            <td>".$data->selldate."</td>
            <td>".$data->total."</td>
            <td><a href='".base_url("book/deleteconfirmedbyadmin/".$data->no_struct)."'>Delete</a></td>
            </tr>";
        }
      }else{ 
        echo "<tr><td align='center' colspan='12'>Empty</td></tr>";
      }
      ?>
    </table>
    <!-- <a href='<?php echo base_url("barang/lihatjual"); ?>'>Lihat Data Penjualan</a><br><br> -->
  </body>
</html>