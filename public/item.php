 <?php 
    require_once("../resources/config.php");

    include(TEMPLATE_FRONT.DS."header.php");
?>
    <!-- Page Content -->
<div class="container">

       <!-- Side Navs -->
       <?php include(TEMPLATE_FRONT.DS."side_nav.php"); 

        $query=query("SELECT * FROM `products` WHERE `product_id`='".$_GET['id']."'");
        confirm($query);

        while($res=fetch_array($query)):

       ?>


    <div class="col-md-9">

        <div class="row">

            <div class="col-md-7">
                <img width='500' class="img-responsive" src="../resources/uploads/<?php echo $res['product_image']?>">
            </div>

            <div class="col-md-5">

                <div class="thumbnail">
             

                    <div class="caption-full">
                        <h4><a href="#"><?php echo $res['product_title']; ?></a> </h4>
                        <hr>
                        <h4 class="">&#36;<?php echo $res['product_price']; ?></h4>
                          
                        <p><?php echo $res['product_description_short'];
                                 echo "<br/><br/><a class='btn btn-primary' href='../resources/cart.php?add=".$res['product_id']."'>ADD TO CART</a>";
                            ?>
                        </p>

                    </div>
                </div>
            </div>
        </div>



        <!--Row for Tab Panel-->

        <div class="row">

            <div role="tabpanel">

                <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#" data-toggle="tab">Description</a>
                        </li>
                    </ul>

                <!-- Tab panes -->
                
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">                        
                            <br/>
                            <p><?php echo $res['product_description'];?></p>
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="profile"></div>
                    </div>

            </div>
        
        </div><!--row for Tab Panel-->

    </div><!--end of col-md-9-->
 
    <?php endwhile; ?>
</div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT.DS."footer.php"); ?>