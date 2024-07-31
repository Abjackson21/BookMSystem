<?php
	include("includes/header.php");
?>

<div id="content">
	<div class="post">
		<h2 class="title"><a href="#">Login</a></h2>
			<p class="meta"></p>
			<div class="entry">
				
				

				<form class="login" action="login_process.php" method="post">
					
					User Name :<br>
					<input type="text" name="unm" class="txt"><br><br>

					Password :<br>
					<input type="password" name="pwd" class="txt"><br><br>

					<?php
						if(!empty($_SESSION['error']))
						{
							foreach($_SESSION['error'] as $er)
							{
								echo '<font color="red">'.$er.'</font><br>';
							}
							unset($_SESSION['error']);
						}
					?>

					<br>

					<input type="submit" value="Login">
					<a href="register.php" style="text-decoration: none"><input type="button" value="Register"></a><br><br>
					<a href="forget_password.php" style="text-decoration: none;">Forget Password ?</a>

				</form>

			</div>
	</div>
</div><!-- end #content -->

<?php
	include("includes/footer.php");
?>