
<?php

    include_once('clientmysql.php');


$getData = $_POST;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
	echo('Il faut un identifiant de recette pour le modifier.');
    return;
}	

$retrieveRecipeStatement = $mysql->prepare('SELECT * FROM invites WHERE id = :id');
$retrieveRecipeStatement->execute([
    'id' => $getData['id'],
]);

$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ajout - Invité</title>
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include_once('header.php'); ?>
	<section class="baniere" id="baniere">
		<div class="card">
		<div class="container">
		<h1>Editer un Invité</h1>
		<form action="postupdate.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $getData['id']; ?>">
				<label for="title" class="form-label">Nom de l'invité</label>
				<input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" value="<?php echo($recipe['nom']); ?>">
				<div id="email-help" class="form-text">Saississez le nom en majuscule !</div>
			</div>
			<div class="mb-3">
				<label for="recipe" class="form-label">Numéro de table</label>
				<input type="text" class="form-control" id="table" name="table" aria-describedby="title-help" value="<?php echo($recipe['numeroTable']); ?>">
			</div>
			
			<button type="submit" class="btn btn-primary">Envoyer</button>
		</form>
		<br/>
	</div>
		</div>
	</section>
	<?php include_once('footer.php'); ?>
	<hr>
</body>
</html>