<?php

include("upload2.php");

?>

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

<form method="post" action="index2.php" enctype="multipart/form-data">

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


