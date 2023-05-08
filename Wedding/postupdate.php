<?php
session_start();

include_once('clientmysql.php');


$postData = $_POST;

if (
	empty($postData['id']) ||
 empty($postData['title']) 
    || empty($postData['table'])
    )
{
	echo('Il manque des informations pour permettre l\'édition du formulaire.');
    return;
}	

$id = strip_tags($postData['id']);
$nom = strip_tags($postData['title']);
$numeroTable = strip_tags($postData['table']);
$nom = strtoupper($nom);

$insertRecipeStatement = $mysql->prepare('UPDATE invites SET nom = :nom, numeroTable = :numeroTable WHERE id = :id');
$insertRecipeStatement->execute([
    'nom' => $nom,
    'numeroTable' => $numeroTable,
    'id' => $id,
]);

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sites de Recettes - Demande de contact reçue</title>
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include_once('header.php'); ?>
	<section class="baniere" id="baniere">
	<div class="container">
		<h1>Modification bien reçue !</h1>
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


