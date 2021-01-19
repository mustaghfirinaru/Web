<div class="container" >
<div class="container bg-gradient-light pt-3" style="min-height:50vh;" >

  <div class="row">
    <h4>Cart</h4>
    <table class="table table-bordered table-hover">
      <tr>
        <th>NO</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Subtotal</th>
      </tr> <?php
            $var = 0;
            $sum = 0;
      if (!empty($this->cart->contents())) {
            foreach ($this->cart->contents() as $data) :
              $var = $var + 1;
              $sum = $sum + $data['subtotal']; ?>
        <tr>
          <td><?php echo $var ?></td>
          <td><?php echo $data['name'] ?></td>
          <td><?php echo $data['qty'] ?></td>
          <td align="right">Rp <?php echo number_format($data['price']) ?></td>
          <td align="right">Rp <?php echo number_format($data['subtotal']) ?></td>
        </tr>
      <?php endforeach; 
            } else {
              echo "<tr><td align='center' colspan='5'>Your cart is empty</td></tr>";
            }?>
      <tr>
        <td align="right" colspan=5>Rp <?php echo number_format($sum); ?></td>
      </tr>
    </table>
    <?php 
      if (!empty($this->cart->contents())) {?>
    <div class="ml-auto ">
      <a href="<?php echo base_url('book/deletecart'); ?>">
        <div class="btn btn-sm btn-danger">Delete Cart</div>
      </a>
      <a href="<?php echo base_url('book/book_list'); ?>">
        <div class="btn btn-sm btn-primary">Shop Other Items</div>
      </a>
      <a href="<?php echo base_url('order/gotoorder'); ?>">
        <div class="btn btn-sm btn-success">Continue Pay</div>
      </a>
    </div>
     <?php } ?>
  </div>
</div>
</div>