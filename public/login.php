<?php 
    require_once("../resources/config.php");
    include(TEMPLATE_FRONT.DS."header.php"); 
?>
    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
        <div class="col-sm-4 col-sm-offset-5">         
            <form id="loginForm" method="post">
                <div class="form-group"><label for="">
                    username<input type="text" id="logUser" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" id="logPword" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-primary">
                  <input type="button" class="btn btn-info" value="Sign Up" data-toggle="modal" data-target="#regModal">
                </div>
            </form>
            <br/><br/>
                <div id="logAlert" class="alert alert-dismissible alert-success hidden">
                    <button type="button" class="close" data-dismiss="alert"><span>&times</span>
                    </button>
                </div>


            <div class="modal fade" id="regModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h4 class="modal-title">Registration Page</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="regForm">
                                <div class="form-group">
                                    Enter Username<input class="form-control" type="text" id="username">
                                </div>
                                <div class="form-group">
                                    Enter Email Id<input class="form-control" type="email" id="email">
                                </div>
                                <div class="form-group">
                                    Enter password<input class="form-control" type="password" id="pword">
                                </div>
                                <div class="form-group">
                                    Enter Address<input class="form-control" type="text" id="address">
                                </div>
                                <div class="form-group">
                                    Enter Mobile No<input class="form-control" type="text" id="mobile">
                                </div>
                                <div class="form-group">
                                <input name="submit" type="submit" class="center-block btn btn-success" value="Register">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            
                            <br/><br/>
                            <div id="regAlert" class="alert alert-dismissible alert-info hidden">
                                <button type="button" class="close" data-dismiss="alert"><span>&times</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  


       </header>


        </div>

    </div>
    <!-- /.container -->
    <script type="text/javascript">

        $("#regForm").submit(function(event){
            event.preventDefault();
            submitRegForm();


            function submitRegForm(){
            var username=$("#username").val();
            var email=$("#email").val();
            var pword=$("#pword").val();
            var register="register";
            var address=$("#address").val();
            var mobile=$("#mobile").val();

            $.ajax({
                type: "post",
                url: "../resources/config.php",
                data: "username="+username+"&email="+email+"&pword="+pword+"&address="+address+"&mobile="+mobile+"&type="+register,
                success: function(result){
                    
                    if(result=="Succesfully Registered")
                        {
                            window.location="login.php";
                            alert("Succesfully Registered");
                        }
                    else{   
                            $("#regAlert").removeClass("hidden"); 
                            $("#regAlert").html(result);
                        }
                }
            });
        }
        });

        $("#loginForm").submit(function(event){
            event.preventDefault();
            submitLogForm();

            function submitLogForm(){
                var username=$("#logUser").val();
                var pword=$("#logPword").val();
                var login="login";


                $.ajax({
                    url:"../resources/config.php",
                    method:"post",
                    data:"username="+username+"&pword="+pword+"&type="+login,
                    success:function(result){
                        if(result=="Incorrect username or password"){
                           $("#logAlert").removeClass("hidden");
                            $("#logAlert").html(result);
                        }
                        else{
                            window.location="admin";
                        }
                    }
                });
            }
        });

        
    </script>

    <?php include(TEMPLATE_FRONT.DS."footer.php")?>

