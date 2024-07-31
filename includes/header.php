<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bookstore Management System</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width", initial-scale=1.0>

<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div id="logo">
		<h1><a href="#">Bookstore Management System</a></h1>
	</div>
	
	<div id="header">
		<div id="menu">
			<ul>
				<li><a href="index.php" class="first">Home</a></li>				
				<li><a href="contact.php">Contact Us</a></li>
				<li><a href="cart.php">Cart</a></li>
			</ul>
		</div>
		
		<div id="search">
			<form method="get" action="search.php">
				<fieldset style="display:flex;">
				<input type="text" name="s" id="search-text" size="15" placeholder="Search">
				<input type="submit" id="search-submit" value="GO">
				<?php 
					if(isset($_SESSION['client']['status']))
					{
						echo '<input type="button" id="search-submit" value="Logout" onclick="window.location.href=\'logout.php\'">';
					}
					else
					{
						echo '<input type="button" id="search-submit" value="Sign In" onclick="window.location.href=\'login.php\'">';
					}
				?>
				<input type="button" id="search-submit" value="Admin" onclick="window.open('admin/index.php', '_blank')">
				</fieldset>
			</form>
		</div>
		
	</div>
	
<div id="page">
