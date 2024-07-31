<?php
	include("includes/header.php");
?>

<div id="content">
	<div class="post">
		<h2 class="title"><a href="#">User Registration</a></h2>
		<p class="meta"></p>
		<div class="entry">
			
			<form class="register" action="register_process.php" method="post">
				
				<?php
				if(isset($_GET['register']))
				{
					echo '<font color="red">Registered Successfully..</font>';
					echo '<br><br>';
				}

				if(isset($_SESSION['error']['existing']))
				{
					echo '<font color="red">'.$_SESSION['error']['existing'].'</font>';
					echo '<br><br>';
				}
				?>

				Full Name :<br>
				<input type="text" name="fnm" class="txt" value="<?php echo isset($_SESSION['input']['fnm']) ? $_SESSION['input']['fnm'] : ''; ?>">
				<?php
				if(isset($_SESSION['error']['fnm']))
				{
					echo '<font color="red">'.$_SESSION['error']['fnm'].'</font>';
				}
				?>
				<br><br>

				User Name :<br>
				<input type="text" name="unm" class="txt" value="<?php echo isset($_SESSION['input']['unm']) ? $_SESSION['input']['unm'] : ''; ?>">
				<?php
				if(isset($_SESSION['error']['unm']))
				{
					echo '<font color="red">'.$_SESSION['error']['unm'].'</font>';
				}
				elseif(isset($_SESSION['error']['existingUsername']))
				{
					echo '<font color="red">'.$_SESSION['error']['existingUsername'].'</font>';
				}
				?>
				<br><br>

				Password :<br>
				<input type="password" name="pwd" class="txt">
				<?php
				if(isset($_SESSION['error']['pwd']))
				{
					echo '<font color="red">'.$_SESSION['error']['pwd'].'</font>';
				}
				elseif(isset($_SESSION['error']['wrongPassword']))
				{
					echo '<font color="red">'.$_SESSION['error']['wrongPassword'].'</font>';
				}
				?>
				<br><br>

				Confirm Password :<br>
				<input type="password" name="cpwd" class="txt">
				<?php 
				if(isset($_SESSION['error']['emptywrongpwd']))
				{
					echo '<font color="red">'.$_SESSION['error']['emptywrongpwd'].'</font>';
				}
				?>
				<br><br>

				E-Mail :<br>
				<input type="text" name="email" class="txt" value="<?php echo isset($_SESSION['input']['email']) ? $_SESSION['input']['email'] : ''; ?>">
				<?php
				if(isset($_SESSION['error']['email']))
				{
					echo '<font color="red">'.$_SESSION['error']['email'].'</font>';
				}
				elseif(isset($_SESSION['error']['existingEmail']))
				{
					echo '<font color="red">'.$_SESSION['error']['existingEmail'].'</font>';
				}
				?>
				<br><br>

				Contact No :<br>
				<input type="text" name="cno" class="txt" value="<?php echo isset($_SESSION['input']['cno']) ? $_SESSION['input']['cno'] : ''; ?>">
				<?php
				if(isset($_SESSION['error']['cno']))
				{
					echo '<font color="red">'.$_SESSION['error']['cno'].'</font>';
				}
				?>
				<br><br>

				Security Question :<br>
				<select name="question" class="txt">
					<option>Which is your Favourite Movie ?</option>
					<option>Which is your Favourite Actress ?</option>
				</select>
				<?php 
				if(isset($_SESSION['error']['que']))
				{
					echo '<font color="red">'.$_SESSION['error']['que'].'</font>';
				}
				?>
				<br><br>

				Security Answer :<br>
				<input type="text" name="answer" value="<?php echo isset($_SESSION['input']['answer']) ? $_SESSION['input']['answer'] : ''; ?>">
				<?php 
				if(isset($_SESSION['error']['answer']))
				{
					echo '<font color="red">'.$_SESSION['error']['answer'].'</font>';
				}
				?>
				<br><br>

				<input type="submit" class="btn" value="Register">

				<p class="login_link">
					<a href="login.php" style="margin-left: 145px; text-decoration: none">Already Account - Login</a>
				</p>

			</form>

			<?php
			unset($_SESSION['error']);
			unset($_SESSION['input']);
			unset($_GET['register']);
			?>

		</div>
	</div>
</div><!-- end #content -->

<?php
	include("includes/footer.php");
?>
