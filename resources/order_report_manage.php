<?php 
	require_once('config.php');
	
	if(isset($_GET['oid'])){
		$query=query("DELETE FROM `orders` WHERE `order_id`='".escape_string($_GET['oid'])."'");
		confirm($query);
		redirect("../public/admin/index.php?orders&status");
	}

	if(isset($_GET['rid'])){
		$query=query("DELETE FROM `reports` WHERE `report_id`='".escape_string($_GET['rid'])."'");
		confirm($query);
		redirect("../public/admin/index.php?reports&status");
	}

	if(isset($_GET['pid'])){
		$query=query("DELETE FROM `products` WHERE `product_id`='".escape_string($_GET['pid'])."'");
		confirm($query);
		redirect("../public/admin/index.php?products&status");
	}

	if(isset($_GET['cid'])){
		$query=query("DELETE FROM `categories` WHERE `cat_id`='".escape_string($_GET['cid'])."'");
		confirm($query);
		redirect("../public/admin/index.php?categories&status");
	}
?>