<div class="row">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                    </div>
                </div>

                            <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <?php 
                                            $oquery=query("SELECT * FROM `orders`");
                                            confirm($oquery);
                                            echo mysqli_num_rows($oquery);
                                        ?>
                                        </div>
                                        <div>Order(s)</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?orders">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        <?php 
                                            $pquery=query("SELECT * FROM `products`");
                                            confirm($pquery);
                                            echo mysqli_num_rows($pquery);
                                            ?>
                                        </div>
                                        <div>Product(s)</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?products">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
          
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php 
                                                $cquery=query("SELECT * FROM `categories`");
                                                confirm($cquery);
                                                echo mysqli_num_rows($cquery);
                                            ?>
                                        </div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?categories">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>            
                </div>
                <!-- /.row -->
</div>