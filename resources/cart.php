<?php 
	require_once("config.php");

	if(isset($_GET['add'])){
		$query=query("SELECT * FROM `products` WHERE `product_id`='".$_GET['add']."'");
		confirm($query);

		while($res=fetch_array($query)){
			if($res['product_quantity']!=$_SESSION['product_'.$_GET['add']]){
				$_SESSION['product_'.$_GET['add']]+=1;
				redirect("../public/checkout.php");
			}
			else{
				redirect("../public/checkout.php");
				$_SESSION['cartStatus']="We only have ".$res['product_quantity']." of ".$res['product_title']." available";
			}
		}
	}

	if(isset($_GET['remove'])){


		if($_SESSION['product_'.$_GET['remove']]<1)
			redirect("../public/checkout.php");

		else{
					$_SESSION['product_'.$_GET['remove']]--;
					unset($_SESSION['cartStatus']);
					redirect("../public/checkout.php");
				}
	}

	if(isset($_GET['delete'])){
		$_SESSION['product_'.$_GET['delete']]="";
		unset($_SESSION['cartStatus']);
		redirect("../public/checkout.php");
	}
?>