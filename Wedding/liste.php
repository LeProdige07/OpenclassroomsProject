<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion des invités - Liste des invités</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include_once('header.php'); ?>
	<section class="baniere" id="baniere">
	<div class="container">
	<?php
		include_once('clientmysql.php');
		
		$sqlQuery = 'SELECT * FROM invites';
		$recipesStatement = $mysql->prepare($sqlQuery);
		$recipesStatement->execute();
		$recipes = $recipesStatement->fetchAll();
		
		foreach ($recipes as $recipe) {
			?>
		
		<div class="card">
				<p>Nom :</p><h3><b><?php echo $recipe['nom']; ?></b></h3>
				<p>Numéro de table :</p><div><i><?php echo $recipe['numeroTable']; ?></i></div><br>
			
			<form action="update.php" method="post" enctype="multipart/form-data">
			<div class="mb-3 visually-hidden">
				<!--<label for="id" class="form-label">Identifiant de la recette</label>-->

				<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $recipe['id']; ?>">

			</div>
	
			<button type="submit" class="btn btn-primary">Editer l'invité</button>
		</form>	

		<form action="postdelete.php" method="post" enctype="multipart/form-data">
			<div class="mb-3 visually-hidden">
				<!--<label for="id" class="form-label">Identifiant de la recette</label>-->

				<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $recipe['id']; ?>">

			</div>
	
			<button type="submit" class="btn btn-danger">Supprimer l'invité</button>
		</form>
		<?php		
		}
?>
		</div>
	</div>
	</section>
	<?php include_once('footer.php'); ?>
</body>
</html>