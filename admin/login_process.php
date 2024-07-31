<?php
	session_start();

	include("../includes/connection.php");

	if (!empty($_POST)) {
		$_SESSION['error'] = array();
		extract($_POST);

		if (empty($unm) || empty($pwd)) {
			$_SESSION['error'][] = "Required User Name & Password";
			header("location: login.php");
			exit;
		}

		// Prepare the query using prepared statements
		$q = "SELECT * FROM admin WHERE a_unm = ? AND a_pwd = ?";
		$stmt = mysqli_prepare($link, $q);
		mysqli_stmt_bind_param($stmt, "ss", $unm, $pwd);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($result)) {
			$_SESSION['admin']['unm'] = $row['a_unm'];
			$_SESSION['admin']['status'] = true;
			header("location: index.php");
			exit;
		} else {
			$_SESSION['error'][] = "Wrong User Name or Password";
			header("location: login.php");
			exit;
		}
	} else {
		header("location: login.php");
		exit;
	}
?>
