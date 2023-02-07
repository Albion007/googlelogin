<?php

# database connection file
include 'db.conn.php';

# fetching images
$sql = "SELECT img_name FROM
	         images ORDER BY id DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();

$images = $stmt->fetchAll();

?>

<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {
			display: flex;
			align-items: center;
			flex-direction: column;
			font-family: 'Roboto', sans-serif;
		}

		.error {
			color: #a00;
		}

		.gallery img {
			width: 150px;
		}
	</style>
</head>

<body>

	<div class="header">
		<h2>Welcome with your random email!</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php if (isset($_SESSION['username'])): ?>
			<p>Welcome <strong>
					<?php echo $_SESSION['username']; ?>
				</strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>

			<form method="post" action="upload.php" enctype="multipart/form-data">

				<?php
				if (isset($_GET['error'])) {
					echo "<p class='error'>";
					echo htmlspecialchars($_GET['error']);
					echo "</p>";
				}
				?>

				<input type="file" name="images[]" multiple>

				<button type="submit" name="upload">
					Upload</button>
			</form>
			<?php if ($stmt->rowCount() > 0) { ?>
				<div class="gallery">
					<h4>All Images</h4>
					<?php foreach ($images as $image) { ?>
						<img src="uploads/<?= $image['img_name'] ?>">
					<?php } ?>
				</div>
			<?php } ?>


		<?php endif ?>
	</div>

</body>

</html>