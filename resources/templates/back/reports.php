<div class="col-md-12">
  <div class="row">
    <?php if(isset($_GET['status']))
      echo "<h4 class='bg-success'>Report Deleted</h4>";
      ?>
    <h1 class="page-header">
       All Orders

    </h1>
  </div>

  <div class="row">
      <table class="table table-hover">
          <thead>

            <tr>
                 <th>Report ID</th>
                 <th>Order ID</th>
                 <th>Product ID</th>
                 <th>Product Title</th>
                 <th>Product Quantity</th>
                 <th>Product Price</th>
                 <th>Delete Order</th>
            </tr>
          </thead>
          <tbody>
            <?php admin_reports(); ?>
          </tbody>
      </table>
  </div>
</div>