<?php 
    require_once("../../resources/config.php");
    include(TEMPLATE_BACK.DS."header.php");
    if(!isset($_SESSION['reguser']))
        redirect("../../public");
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                    <?php 
                        if($_SERVER['REQUEST_URI']=='/ecomm/public/admin/' || $_SERVER['REQUEST_URI']=='/ecomm/public/admin/index.php'){
                            include(TEMPLATE_BACK.DS.'admin_content.php');
                        }
                        if(isset($_GET['orders'])){

                            include(TEMPLATE_BACK.DS.'orders.php');
                        }
                        if(isset($_GET['add_product'])){
                            
                            include(TEMPLATE_BACK.DS.'add_product.php');
                        }
                        if(isset($_GET['categories'])){
                            
                            include(TEMPLATE_BACK.DS.'categories.php');
                        }
                        if(isset($_GET['edit_product'])){
                            
                            include(TEMPLATE_BACK.DS.'edit_product.php');
                        }
                        if(isset($_GET['products'])){
                            
                            include(TEMPLATE_BACK.DS.'products.php');
                        }
                        if(isset($_GET['reports'])){
                            
                            include(TEMPLATE_BACK.DS.'reports.php');
                        }
                        if(isset($_GET['users'])){
                            
                            include(TEMPLATE_BACK.DS.'users.php');
                        }
                     ?>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include(TEMPLATE_BACK.DS."footer.php"); ?>
