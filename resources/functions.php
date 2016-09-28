<?php

	//Sql Helper Functions

	function redirect($location){
		header("Location: $location");
	}

	function query($sql){
		global $connection;
		return mysqli_query($connection,$sql);
	}

	function confirm($sql){
		global $connection;
		if(!$sql){
			die("QUery Failed: ".mysqli_error($connection));
		}
	}

	function escape_string($string){

		global $connection;
		return mysqli_real_escape_string($connection,$string);
	}

	function fetch_array($res){
		return mysqli_fetch_array($res);
	}

	function insert_id(){
		global $connection;

		return mysqli_insert_id($connection);
	}



	//Ecommerce Functions
	function get_product(){
		$query=query("SELECT * FROM `products`");
		confirm($query);

		while($res=fetch_array($query))
		{
				 echo "<div class='col-sm-3 col-lg-3 col-md-3'>
		                        <div class='thumbnail'>
		                        <a href='item.php?id=".$res['product_id']."'>
		                            <img src='../resources/uploads/".$res['product_image']."' alt=''>
		                        </a>
		                            <div class='caption'>
		                                <h4 class='pull-right'>&#36;".$res['product_price']."</h4><br/><br/>
		                                <h5><a href='item.php?id=".$res['product_id']."'>".$res['product_title']."</a>
		                                </h5>
		                                <a class='btn btn-success' target='_blank' href='../resources/cart.php?add=".$res['product_id']."'>Add to cart
		                            </a>
		                            </div>
		                        </div>
		                    </div>";
		                }
	}


	function get_category(){
		$query=query("SELECT * FROM `categories`");
		confirm($query);

		while($res=fetch_array($query)){
			echo "<a href='category.php?id=".$res['cat_id']."' class='list-group-item'>".$res['cat_title']."</a>";
		}
	}

	function get_products_to_category(){
		$query=query("SELECT * FROM `products` WHERE `product_category_id`='".escape_string($_GET['id'])."'");
		confirm($query);

		while($res=fetch_array($query)){
			echo "<div class='col-md-3 col-sm-6 hero-feature'>
			                <div class='thumbnail'>
			                    <img src='../resources/uploads/".$res['product_image']."' alt=''>
			                    <div class='caption'>
			                        <h3>".$res['product_title']."</h3>
			                        <p>".substr($res['product_description_short'],0,100)."...</p>
			                        <p>
			                            <a href='item.php?id=".$res['product_id']."' class='btn btn-primary'>Buy Now!</a>
			                        </p>
			                    </div>
			                </div>
			            </div>";
		}
	}

	function get_products_for_shop(){
		$query=query("SELECT * FROM `products`");
		confirm($query);
		while($res=fetch_array($query)){
			echo "<div class='col-md-3 col-sm-6 hero-feature'>
			                <div class='thumbnail'>
			                    <img src='../resources/uploads/".$res['product_image']."' alt=''>
			                    <div class='caption'>
			                        <h3>".$res['product_title']."</h3>
			                        <p>".$res['product_description_short']."</p>
			                        <p>
			                            <a href='item.php?id=".$res['product_id']."' class='btn btn-primary'>Buy Now!</a>
			                        </p>
			                    </div>
			                </div>
			            </div>";
		}
	}

	function get_items_checkout(){
			$product_num=0;
			foreach($_SESSION as $name=>$value){
				if(substr($name,0,8)=='product_'){
					$name=substr($name,8);
					$query=query("SELECT * FROM `products` WHERE `product_id`='".escape_string($name)."'");
					confirm($query);

			while($res=fetch_array($query)){

				if($value!=0){
					$product_num++;
					$subtotal=$value*$res['product_price'];
				echo "<tr>
					<td>".$res['product_title']."</td>
					<td><img width='60' src='../resources/uploads/".$res['product_image']."'></td>
	                <td>&#36;".$res['product_price']."</td>
	                <td>".$value."</td>
	                <td>&#36;".$subtotal."</td>
	                
	                <td>
		                <a href='../resources/cart.php?remove=".$res['product_id']."' class='btn btn-warning'><span class='glyphicon glyphicon-minus'></span></a>
		                <a href='../resources/cart.php?add=".$res['product_id']."' class='btn btn-success'><span class='glyphicon glyphicon-plus'></span></a>
		                <a href='../resources/cart.php?delete=".$res['product_id']."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a>
		            </td>
	            	</tr>
	            	<input type='hidden' name='item_name_".$product_num."' value='".$res['product_title']."'>
	            	<input type='hidden' name='item_number_".$product_num."' value='".$res['product_id']."'>
  					<input type='hidden' name='amount_".$product_num."' value='".$res['product_price']."'>
  					<input type='hidden' name='quantity_".$product_num."' value='".$value."'>";

  					
				}
					@$_SESSION['cart_cost']=$total+=$subtotal;
	            	@$_SESSION['cart_items']=$_total+=$value;
					

					}
				}
			}
		}

		

	function orders(){

		if(isset($_GET['tx'])){
			if($_GET['st']=='Completed'){
				echo "<br/><p class='lead text-center bg-success'>Your transaction was completed, Your order total was $".$_GET['amt']."</p>";
				
				$query=query("INSERT INTO `orders`(`order_transaction_id`,`order_amt`,`order_currency`,`order_st`) VALUES ('".$_GET['tx']."','".$_GET['amt']."','".$_GET['cc']."','".$_GET['st']."')");
				confirm($query);

				$orderid=insert_id();
				
				}	
				//var_dump($_SESSION);
				foreach($_SESSION as $pname => $count) {
					if(substr($pname,0,8)=='product_'){
						
						$pname=substr($pname,8);
						$query=query("SELECT * FROM `products` WHERE `product_id`='".escape_string($pname)."'");
						confirm($query);
						while($res=fetch_array($query)){
							if($count!=0){
								$subtotal=$count*$res['product_price'];
								$pid=$res['product_id'];
								$ptitle=$res['product_title'];
								$reportq=query("INSERT INTO `reports`(`product_title`,`order_id`,`product_id`,`product_price`,`product_quantity`) VALUES ('".$ptitle."','".$orderid."','".$pid."','".$subtotal."','".$count."')");
								confirm($reportq);
							}
						}
					}
				}
				session_destroy();
			}
			else{
				echo "<br/><p class='lead text-center bg-danger'>Your Transaction Failed</p>";
			}
	}

	function show_paypal_button(){
		echo "<input type='image' name='upload' src='paypal-logo.png'
    			alt='PayPal - The safer, easier way to pay online'>
			</form>";
	}
	function send_message(){
		if(isset($_POST['submit'])){
				$to="your_email@email.com";
				$subject=$_POST['subject'];
				$message=$_POST['message'];
				$from="From: ".$_POST['email'];
				mail($to, $subject, $message,$from);
			}
	}


	//Admin Level Functions


	function admin_orders(){
		$query=query("SELECT * FROM `orders`");
		confirm($query);

		while($res=fetch_array($query)){
			echo "<tr>
            <td>".$res['order_id']."</td>
            <td><img src='http://placehold.it/50x50' alt=''></td>
            <td>".$res['order_currency']."</td>
            <td>".$res['order_amt']."</td>
           <td>".$res['order_st']."</td>
           <td><a class='btn btn-danger' href='../../resources/order_report_manage.php?oid=".$res['order_id']."'><span class='glyphicon glyphicon-remove'></span></a></td>
        </tr>";	
		}
		
	}

	function admin_reports(){
		$query=query("SELECT * FROM `reports`");
		confirm($query);

		while($res=fetch_array($query)){
			echo "<tr>
            <td>".$res['report_id']."</td>
            <td>".$res['order_id']."</td>
            <td>".$res['product_id']."</td>
            <td>".$res['product_title']."</td>
            <td>".$res['product_quantity']."</td>
            <td>".$res['product_price']."</td>
            <td><a href='../../resources/order_report_manage.php?rid=".$res['report_id']."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a></td>
            	</tr>";
		}
	}

	function admin_products(){
		$query=query("SELECT * FROM `products`");
		confirm($query);

		while($res=fetch_array($query)){
			echo "<tr>
	                <td>".$res['product_id']."</td>
	                <td>".$res['product_title']."</td>
	                <td>
	                		<img width='100' src='../../resources/uploads/".$res['product_image']."'>
	                </td>
	                <td>".show_category_name($res['product_category_id'])."</td>
	                <td>".$res['product_price']."</td>
	                <td>".$res['product_quantity']."</td>
	                <td><a class='btn btn-danger' href='../../resources/order_report_manage.php?pid=".$res['product_id']."'><span class='glyphicon glyphicon-remove'></span></a>
	                </td>
	                <td><a class='btn btn-info' href='index.php?edit_product&pid=".$res['product_id']."'><span class='glyphicon glyphicon-edit'></span></a>
	                </td>
          		   </tr>";
		}
	}

	function show_category_name($catid){
		$query=query("SELECT * FROM `categories` WHERE `cat_id`='".$catid."'");
		confirm($query);
		while($res=fetch_array($query)){
			return $res['cat_title'];
		}
	}



	function admin_add_products(){

		if(isset($_POST['publish'])){
			$product_title=escape_string($_POST['product_title']);
			$product_description=escape_string($_POST['product_description']);
			$product_price=escape_string($_POST['product_price']);
			$product_category=escape_string($_POST['product_category']);
			$product_quantity=escape_string($_POST['product_quantity']);
			$product_description_short=escape_string($_POST['product_description_short']);			
			$product_image=$_FILES['file']['name'];
			move_uploaded_file($_FILES['file']['tmp_name'],UPLOAD_DIRECTORY.DS.$_FILES['file']['name']);
			
						$query=query("INSERT INTO `products`(`product_title`,`product_category_id`,`product_price`,`product_quantity`,`product_description`,`product_description_short`,`product_image`) VALUES('".$product_title."','".$product_category."','".$product_price."','".$product_quantity."','".$product_description."','".$product_description_short."','".$product_image."')");
						confirm($query);
			
						redirect("index.php?products$apname='".$product_title."'");
					
		}
	}

	function admin_add_products_categories(){
		$query=query("SELECT * FROM `categories`");
		confirm($query);

		while($res=fetch_array($query)){
			echo "<option value='".$res['cat_id']."'>".$res['cat_title']."</option>";
		}
	}


	function admin_edit_products(){

		if(isset($_POST['edit'])){
			$product_title=escape_string($_POST['product_title']);
			$product_description=escape_string($_POST['product_description']);
			$product_price=escape_string($_POST['product_price']);
			$product_category=escape_string($_POST['product_category']);
			$product_quantity=escape_string($_POST['product_quantity']);
			$product_description_short=escape_string($_POST['product_description_short']);
			$product_image=escape_string($_FILES['file']['name']);
			$image_temp_location=escape_string($_FILES['file']['tmp_name']);
			move_uploaded_file($image_temp_location,UPLOAD_DIRECTORY.DS.$product_image);

			if(empty($product_image)){
				$pquery=query("SELECT * FROM `products` WHERE `product_id`='".escape_string($_GET['pid'])."'");
				while($pic=fetch_array($pquery)){
					$product_image=$pic['product_image'];
				}
			}
			
						$query=query("UPDATE `products` SET `product_title`='".$product_title."',`product_category_id`='".$product_category."',`product_price`='".$product_price."',`product_quantity`='".$product_quantity."',`product_description`='".$product_description."',`product_description_short`='".$product_description_short."',`product_image`='".$product_image."' WHERE `product_id`='".$_GET['pid']."'");
						confirm($query);
			
						redirect("index.php?products&pname='".$product_title."'");
					
		}
	}

	function admin_show_categories(){
		$query=query("SELECT * FROM `categories`");
		confirm($query);

		while($res=fetch_array($query)){
			echo "<tr>
    				<td>".$res['cat_id']."</td>
    				<td>".$res['cat_title']."</td>
    				<td><a href='../../resources/order_report_manage.php?cid=".$res['cat_id']."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a></td>
				</tr>";
		}
	}

	function admin_add_categories(){
		if(isset($_POST['addc'])){
			//check for whitespace or empty field
			if(empty($_POST['title']) || preg_match('/\s+/',$_POST['title']))
				redirect("index.php?categories&estatus");	
			else{

						$cat_title=escape_string($_POST['title']);
						$query=query("INSERT INTO `categories`(`cat_title`) VALUES('".$cat_title."')");
						confirm($query);
						redirect("index.php?categories&cname='".$cat_title."'");}
		}
	}

	function display_admin_users(){
		$query=query("SELECT * FROM `users`");
		confirm($query);

		while($res=fetch_array($query)){
			echo "<tr>
                        <td>".$res['id']."</td>
                        <td>".$res['email']."</td>
                        <td>".$res['address']."</td>
                        <td>".$res['mobile']."</td>
                  </tr>";
		}
	}

	

	//Registration and Login Functionality

	
		if(@$_POST['type']=='register'){
				$error="";
				if(!$_POST['username'])
					$error="<br/>Please enter username";
				else if(strlen($_POST['username'])>10)
					$error.="<br/>username should be less than 10 characters";
				else if(preg_match('/[^a-zA-Z0-9]/',$_POST['username']))
					$error.="<br/>No special characters allowed in username";
		
				if(!$_POST['email'])
					$error.="<br/>Please enter your email id";
				else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
					$error.="<br/>Please enter valid email id";

				if(!$_POST['address'])
					$error.="<br/>Please enter your shipping address";

				if(!$_POST['mobile'])
					$error.="<br/>Please enter your 10 digit mobile number";
				else if(!preg_match('/^[789][0-9]{9}$/',$_POST['mobile']))
					$error.="<br/>Please enter a valid 10 digit mobile number";

				if(!$_POST['pword'])
					$error.="<br/>Please enter a password";
				else if(preg_match('/[^a-zA-Z0-9]/',$_POST['pword']))
					$error.="<br/>Password should contain alpahabets or numbers";
				else if(strlen($_POST['pword'])<6)
					$error.="<br/>Password length should be more than 6 characters";
		
				if($error){
					echo "There were error(s) in your form".$error;
				}
				else{
					$query=query("SELECT * FROM `users` WHERE `username`='".escape_string($_POST['username'])."' AND `email`='".escape_string($_POST['email'])."'");
					confirm($query);
		
					if(mysqli_num_rows($query)==0){
						$query=query("INSERT INTO `users`(`username`,`email`,`password`,`address`,`mobile`) VALUES ('".escape_string($_POST['username'])."','".escape_string($_POST['email'])."','".md5($_POST['username'].md5($_POST['pword']))."','".escape_string($_POST['address'])."','".$_POST['mobile']."')");
						confirm($query);
						echo "Succesfully Registered";
					}
					else
					{
						echo "Username or email already exists";
					}
				}
			}
	

	
		if(@$_POST['type']=='login'){
				$res="";$error1="";
				if(!$_POST['username'])
					$error1="Please enter username";
				if(!$_POST['pword'])
					$error1.="<br/>Please enter password";
				if($error1)
					echo $error1;
				else{
					$query=query("SELECT * FROM `users` WHERE `username`='".escape_string($_POST['username'])."' AND `password`='".md5($_POST['username'].md5($_POST['pword']))."'");
					confirm($query);
					if(mysqli_num_rows($query)){
						$_SESSION['reguser']=escape_string($_POST['username']);
					}
					else
					{	
						echo "Incorrect username or password";
					}
				}
	
	}

	if(isset($_GET['logout'])){
		session_destroy();
		redirect("../public");
	}
?>