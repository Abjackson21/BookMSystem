<?php
	session_start();

	if (isset($_GET['bcid'])) {
		include("includes/connection.php");

		$bcid = $_GET['bcid'];

		$q = "SELECT * FROM book WHERE b_id = ?";
		$stmt = $link->prepare($q);
		$stmt->bind_param("i", $bcid);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$_SESSION['cart'][] = array("id" => $row['b_id'], "nm" => $row['b_nm'], "img" => $row['b_img'], "price" => $row['b_price'], "qty" => 1);
	} elseif (!empty($_POST)) {
		foreach ($_POST as $id => $qty) {
			$_SESSION['cart'][$id]['qty'] = $qty;
		}
	} elseif (isset($_GET['id'])) {
		$id = $_GET['id'];
		unset($_SESSION['cart'][$id]);
	}

	header("location: cart.php");
?>
