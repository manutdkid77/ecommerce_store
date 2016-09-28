<?php
    require_once("../resources/config.php");

    include(TEMPLATE_FRONT.DS."header.php");
?>




    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!--Category Section in side_nav.php-->
            <div class="col-md-12">

                <div class="row">
                    <!--Products Section in functions.php-->
                    <h1 class="text-center">Thank You</h1>
                    <?php orders(); ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT.DS."footer.php");
?>