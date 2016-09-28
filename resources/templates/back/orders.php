

        <div class="col-md-12">
<div class="row">
<?php if(isset($_GET['status']))
  echo "<h4 class='bg-success'>Order Deleted</h4>";
  ?>
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Order ID</th>
           <th>Transaction ID</th>
           <th>Order Currency</th>
           <th>Order Amount</th>
           <th>Order Status</th>
           <th>Delete Order</th>
      </tr>
    </thead>
    <tbody>
      <?php admin_orders(); ?>
    </tbody>
</table>
</div>
</div>
