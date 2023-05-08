<?php 

include_once('clientmysql.php'); 

// verification du formulaire soumis

if(
	empty($_POST['title'])
	|| empty($_POST['table'])
)
{
	include_once('Error.php');
	return;
}
$nom = strip_tags($_POST['title']);
$numeroTable = strip_tags($_POST['table']);

$nom = strtoupper($nom);

//faire inserer les donnees en base

		
$sqlQuery = 'INSERT INTO invites(nom,numeroTable) VALUES (:nom, :numeroTable)' ;

$insertRecipe = $mysql->prepare($sqlQuery);
$insertRecipe->execute([
	'nom' => $nom,
	'numeroTable' => $numeroTable

]);
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion des invités - enregistrement</title>
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include_once('header.php'); ?>
	<section class="baniere" id="baniere">
	<div class="container">
		<h1>Enregistrement bien reçu !</h1>
		<div class="card">
			<div class="card-body">
				<p class="card-text"><b>Nom</b> : <?php echo($nom); ?></p>
				<p class="card-text"><b>NumeroTable</b> : <?php echo strip_tags($numeroTable); ?></p>
			</div>
		</div>
	</div>
	</section>
	<?php include_once('footer.php'); ?>
</body>
</html>