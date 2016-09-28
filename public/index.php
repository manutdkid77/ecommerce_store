<?php
    require_once("../resources/config.php");

    include(TEMPLATE_FRONT.DS."header.php");
?>




    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!--Category Section in side_nav.php-->
            <?php include(TEMPLATE_FRONT.DS."side_nav.php"); ?>

            <div class="col-md-9">

                <div class="row inventory">
                    <!--Products Section in functions.php-->
                    <?php get_product(); ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT.DS."footer.php");
?>