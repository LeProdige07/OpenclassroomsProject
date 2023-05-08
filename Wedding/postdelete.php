<?php 

include_once('clientmysql.php');

// verification du formulaire soumis

if(!isset($_POST['id']))
{
	echo 'il faut un identifiant valide pour supprimer une recette.';
	return;
}
$id = $_POST['id'];

//faire supprimer les donnees en base

		
$sqlQuery = 'DELETE FROM invites WHERE id= :id';

$deleteRecipe = $mysql->prepare($sqlQuery);
$deleteRecipe->execute([
	'id' => $id,
]);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion des invités - Recherche</title>
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>


	<?php include_once('header.php'); ?>
	<section class="baniere" id="baniere">
	<div class="container">
		<h1>Résultat !</h1>
		<div class="card">
			<div class="card-body">
				<h5 class="card-title"><b>Suppression réussie !</b></h5>
			</div>
		</div>
	</div>
	</section>
	<?php include_once('footer.php'); ?>
</body>
</html>