<?php
	include("includes/header.php");
?>

<div id="content" class="centered">
	<div class="post">
		<h2 class="title"><a href="#"></a></h2>
		<p class="meta"></p>
		<div class="entry">

			<?php
			include("includes/connection.php");

			$lq = "SELECT * FROM book ORDER BY b_id DESC LIMIT 0,100";
			$lres = mysqli_query($link, $lq);

			while ($lrow = mysqli_fetch_assoc($lres)) {
				$id = $lrow['b_id'];
				$image = $lrow['b_img'];
				$name = $lrow['b_nm'];
				$price = $lrow['b_price'];

				echo '<div class="book_box" class="centered">
						<a href="book_detail.php?id=' . $id . '">
							<img src="' . $image . '">
							<h2>' . $name . '</h2>
							<p>RM' . $price . '</p>
						</a>
					</div>';
			}
			?>

			<div style="clear:both;"></div>

		</div>
	</div>
</div>

<?php
	include("includes/footer.php");
?>
