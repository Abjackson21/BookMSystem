<?php
	session_start();
	
	include("../includes/connection.php");

	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$bookId = $_GET['id'];

		$query = "DELETE FROM book WHERE b_id = ?";
		$stmt = $link->prepare($query);
		$stmt->bind_param("i", $bookId);
		$stmt->execute();

		if ($stmt->affected_rows > 0) {
			header("location: book_view.php");
			exit();
		} else {
			header("location: book_view.php");
			exit();
		}
	} else {
		header("location: book_view.php");
		exit();
	}
?>
