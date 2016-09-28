<h1 class="page-header">
  Product Categories
</h1>
<?php
    if(isset($_GET['status']))
        echo "<h4 class='bg-success text-center'>Category Deleted</h4>";

    if(isset($_GET['cname']))
        echo "<h4 class='bg-success text-center'>Category ".$_GET['cname']." Added</h4>";
?>

<div class="col-md-4">
    <?php admin_add_categories(); ?>
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" class="form-control" name="title">
            <?php 
                if(isset($_GET['estatus']))
                    echo "<h4 class='bg-danger text-center'>Category Name field cannot be empty And No spaces allowed</h4>"; 
            ?>
        </div>

        <div class="form-group">
            
            <input name="addc" type="submit" class="btn btn-primary" value="Add Category">
        </div>      


    </form>

</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Delete Category</th>
        </tr>
            </thead>


        <tbody>
            <?php admin_show_categories(); ?>
        </tbody>

    </table>

</div>