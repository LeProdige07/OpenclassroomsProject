<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
		<?php include_once('header.php'); ?>
		<section class="baniere" id="baniere">
		<div class="container">
		

		<form action="postdelete.php" method="post" enctype="multipart/form-data">
			<div class="mb-3 visually-hidden">
				<!--<label for="id" class="form-label">Identifiant de la recette</label>-->

				<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_SESSION['ID']; ?>">

			</div>
	
			<button type="submit" class="btn btn-danger">La suppression est definitive</button>
		</form>
		<br/>
	</div>
	</section>
	<hr>
</body>
</html>