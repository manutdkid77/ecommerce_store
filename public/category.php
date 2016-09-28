<?php 
    require_once('../resources/config.php');
    include(TEMPLATE_FRONT.DS."header.php");
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <?php 
                $query=query("SELECT cat_title FROM `categories` WHERE `cat_id`='".escape_string($_GET['id'])."'"); 
                confirm($query);
                while($res=fetch_array($query)){
                    echo "<h1>".$res[0]."</h1>";
                }
            ?>
            
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center category-inventory">

            <?php get_products_to_category(); ?>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php include(TEMPLATE_FRONT.DS."footer.php"); ?>