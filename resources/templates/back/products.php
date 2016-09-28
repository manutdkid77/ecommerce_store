<div class="row">

    <h1 class="page-header">
       All Products

    </h1>
    <?php
    if(isset($_GET['status']))
      echo "<h4 class='bg-success'>Product Deleted</h4>";

    if(isset($_GET['apname']))
      echo "<h4 class='bg-success'>Product ".$_GET['apname']." Added Succesfully</h4>";

    if(isset($_GET['pname']))
      echo "<h4 class='bg-success'>Product ".$_GET['pname']." Edited Succesfully</h4>";
  ?>

    <table class="table table-hover">


        <thead>

          <tr>
               <th>Id</th>
               <th>Title</th>
               <th>Photo</th>
               <th>Category</th>
               <th>Price</th>
               <th>Quantity</th>
               <th>Delete Product</th>
               <th>Edit Product</th>
          </tr>
        </thead>
        <tbody>

          <?php admin_products(); ?>

        </tbody>

    </table>

</div>

        