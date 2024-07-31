<?php
	session_start();

	if (!empty($_POST)) {
		$_SESSION['error'] = array();
		$_SESSION['input'] = $_POST; // Store user input in session

		$fnm = $_POST['fnm'] ?? '';
		$unm = $_POST['unm'] ?? '';
		$pwd = $_POST['pwd'] ?? '';
		$cpwd = $_POST['cpwd'] ?? '';
		$email = $_POST['email'] ?? '';
		$question = $_POST['question'] ?? '';
		$answer = $_POST['answer'] ?? '';
		$cno = $_POST['cno'] ?? '';

		include("includes/connection.php");

		$checkUsernameQuery = "SELECT * FROM register WHERE r_unm = ?";
		$stmt = $link->prepare($checkUsernameQuery);
		$stmt->bind_param("s", $unm);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowCount = $result->num_rows;

		if ($rowCount > 0) {
			$_SESSION['error']['existingUsername'] = "Username already exists";
		}

		$checkEmailQuery = "SELECT * FROM register WHERE r_email = ?";
		$stmt = $link->prepare($checkEmailQuery);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowCount = $result->num_rows;

		if ($rowCount > 0) {
			$_SESSION['error']['existingEmail'] = "Email already exists";
		}

		if (empty($fnm)) {
			$_SESSION['error']['fnm'] = "Please enter Full Name";
		}

		if (empty($unm)) {
			$_SESSION['error']['unm'] = "Please enter User Name";
		}
		
		if (empty($pwd)) {
			$_SESSION['error']['pwd'] = "Please enter Password";
		} 

		if (empty($pwd) || empty($cpwd)) {
		} if ($pwd != $cpwd) {
			$_SESSION['error']['pwd'] = "Password doesn't match";
		} elseif (strlen($pwd) < 8) {
			$_SESSION['error']['pwd'] = "Please enter a minimum of 8 characters for the password";
		}

		if (empty($cpwd)) {
			$_SESSION['error']['emptywrongpwd'] = "Please enter the confirm password";
		}

		if (empty($email)) {
			$_SESSION['error']['email'] = "Please enter E-Mail Address";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['error']['email'] = "Please enter a valid E-Mail Address";
		}

		if (empty($answer)) {
			$_SESSION['error']['answer'] = "Please enter Security Answer";
		}

		if (empty($cno)) {
			$_SESSION['error']['cno'] = "Please enter Contact Number";
		} elseif (!is_numeric($cno)) {
			$_SESSION['error']['cno'] = "Please enter Contact Number in Numbers";
		}

		if (!empty($_SESSION['error'])) {
			foreach ($_SESSION['error'] as $er) {
				echo '<font color="red">' . $er . '</font><br>';
			}
			header("location: register.php");
		} else {
			include("includes/connection.php");

			$t = time();

			$q = "INSERT INTO register (r_fnm, r_unm, r_pwd, r_cno, r_email, r_question, r_answer, r_time) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $link->prepare($q);
			$stmt->bind_param("sssssssi", $fnm, $unm, $pwd, $cno, $email, $question, $answer, $t);
			$stmt->execute();

			header("location: register.php?register");
		}
	} else {
		header("location: register.php");
	}
?>
