<?php
	include("includes/header.php");
	include("includes/connection.php");

	$bid = $_GET['id'];

	$book_query = "SELECT * FROM book WHERE b_id = ?";
	$book_stmt = $link->prepare($book_query);
	$book_stmt->bind_param("i", $bid);
	$book_stmt->execute();
	$book_res = $book_stmt->get_result();
	$book_row = $book_res->fetch_assoc();
?>

<div id="content" class="centered">
	<div class="post">
		<h2 class="title"><a href="#"></a></h2>
			<p class="meta"></p>
			<div class="entry">
				
				<table class="book_detail" width="100%" border="0">
					<tr valign="top">
						<td width="48%"><img class="book_img" src="<?php echo $book_row['b_img']; ?>" width="280" height="350"></td>

						<td>
							<h1><?php echo $book_row['b_nm']; ?></h1>
							<p class="desc"><?php echo $book_row['b_desc']; ?></p>

							<p class="price">Rm <?php echo $book_row['b_price']; ?></p>

							<?php
								$is_cart = 0;

								if(isset($_SESSION['cart'])) {
									foreach($_SESSION['cart'] as $id => $val) {
										if($val['img'] == $book_row['b_img']) {
											$is_cart = 1;
											break;
										}
									}
								}

								if(isset($_SESSION['client']['status'])) {
									if($is_cart == 0) {
										echo '<a href="addtocart.php?bcid='.$book_row['b_id'].'" class="cart_btn">Add to Cart</a>';
									} else {
										echo "Already in Cart";
									}
								} else {
									echo '<a href="#" class="cart_btn">Add to Cart</a><a style="text-decoration: none" href="login.php"><h2>Click here to Login..</h2></a>';
								}
							?>
						</td>
					</tr>
				</table>
			</div>
	</div>
</div>

<?php
	include("includes/footer.php");
?>
