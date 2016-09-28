<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Section</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            
                <!--Top Navigation-->
                <?php include(TEMPLATE_BACK.DS."top_nav.php"); ?>
            
            <!-- Sidebar Menu Items-->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <!--Side bar-->
               <?php include(TEMPLATE_BACK.DS."side_nav.php"); ?>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
