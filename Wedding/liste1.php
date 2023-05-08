<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion des invités - Liste des invités</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include_once('header1.php'); ?>
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
		<article>
				<p><strong>Nom :</strong></p><h3><b><?php echo $recipe['nom']; ?></b></h3>
				<p>Numéro de table :</p><div><b><?php echo $recipe['numeroTable']; ?></b></div><br>
			<p>L'invité est là :</p><div><b><?php echo $recipe['presence']; ?></b></div><br>
			
			</article>
		<?php		
		}
?>
		</div>
	</div>
	</section>
	<?php include_once('footer.php'); ?>
</body>
</html>