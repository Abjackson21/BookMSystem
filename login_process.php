<?php
	session_start();
	
	if(!empty($_POST)) {
		$unm = $_POST['unm'] ?? '';
		$pwd = $_POST['pwd'] ?? '';
		$_SESSION['error'] = array();

		if(empty($unm) || empty($pwd)) {
			$_SESSION['error'][] = "Please enter User Name or Password";
			header("location: login.php");
		} else {
			include("includes/connection.php");

			$q = "SELECT * FROM register WHERE r_unm = ? AND r_pwd = ?";
			$stmt = $link->prepare($q);
			$stmt->bind_param("ss", $unm, $pwd);
			$stmt->execute();
			$res = $stmt->get_result();
			$row = $res->fetch_assoc();

			if(!empty($row)) {
				$_SESSION['client']['unm'] = $row['r_fnm'];
				$_SESSION['client']['id'] = $row['r_id'];
				$_SESSION['client']['status'] = true;

				header("location: index.php");
			} else {
				$_SESSION['error'][] = "Wrong Username or Password";
				header("location: login.php");
			}
		}
	} else {
		header("location: login.php");
	}
?>
