<!DOCTYPE html>
<html>
<?php
// session_start();
$host="localhost";
$user="root";
$pass="";
$dbm="bookpi";
$conn=mysqli_connect($host,$user,$pass,$dbm);
if($conn){
    $open=mysqli_select_db($conn,$dbm);
}
$query="SELECT price,title,name,email,orderdate,selldate,qty FROM book,bookorder,invoice,user WHERE book.isbn=bookorder.isbn and invoice.idinvoice=bookorder.idinvoice and invoice.order_user=user.username and paid=TRUE";
$sql=mysqli_query($conn,$query);
?>
  <head>
    <title>CRUD Codeigniter</title></head>
  <body>
    <h1>Sales Data</h1>
    <table border="1">
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
              while ($data=mysqli_fetch_array($sql)) {
                $var = $var + 1;
                $total=$total+$data['qty']*$data['price'];
                echo "<tr>
          <td>$var</td>
          <td>" . $data['title'] . "</td>
          <td>" . $data['name'] . "</td>
          <td>" . $data['email'] . "</td>
          <td>" . $data['orderdate'] . "</td>
          <td>" . $data['selldate'] . "</td>
          <td>" . $data['qty'] . "</td>
          <td align='right'>Rp. " . number_format($data['qty']*$data['price']) . "</td>
          </tr>";
        }
        echo "
        <tr><tr/>
        <td>  Earn  </td>
        <td align='right'colspan='7'>  Rp "; echo number_format($total); echo "  </td>";
            ?>
          </table>
     </body>
</html>