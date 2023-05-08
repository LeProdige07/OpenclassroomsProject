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

<?php 


include_once('clientmysql.php'); 
$terme_recherche = strip_tags($_POST['nom']);
$terme_recherche = strtoupper($terme_recherche);
	
	if(empty($_POST['nom'])){
		include_once('errorRecherche.php');
		return;
	}

		$terme_recherche = addslashes($terme_recherche);
$sqlquery = "select * from invites WHERE nom LIKE ? OR numeroTable LIKE ?";
$selectalbinos = $mysql->prepare($sqlquery);
$selectalbinos->execute(array("%".$terme_recherche."%", "%".$terme_recherche."%"));
$invites = $selectalbinos->fetchAll();

 

	foreach ($invites as $invite){
		?>
	<div class="container">
		
		<div class="card">
			<h1> Résultat !</h1>
			<div class="card-body">
				<p class="card-text"><b>Nom</b> : <b><?php echo($invite['nom']); ?></b></p>
				<p class="card-text"><b>Numéro de Table</b> : <b><?php echo strip_tags($invite['numeroTable']); ?></b></p>
				<p class="card-text"><b>Présence</b> : <b><?php echo strip_tags($invite['presence']); ?></b></p>
				<form action="update.php" method="post" enctype="multipart/form-data">
			<div class="mb-3 visually-hidden">
				<!--<label for="id" class="form-label">Identifiant de la recette</label>-->

				<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $invite['id']; ?>">

			</div>
	
			<button type="submit" class="btn btn-primary">Editer l'invité</button>
		</form>	

		<form action="postdelete.php" method="post" enctype="multipart/form-data">
			<div class="mb-3 visually-hidden">
				<!--<label for="id" class="form-label">Identifiant de la recette</label>-->

				<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $invite['id']; ?>">

			</div>
	
			<button type="submit" class="btn btn-danger">Supprimer l'invité</button>
		</form>
			</div>
		</div>
	<?php
	}	
		$selectalbinos->closeCursor();
?>
			<?php if(!isset($invite)) : 
			
		include_once('errorRecherche2.php');	
		
			?>
			<?php endif; ?>
		
			</div>
	</section>
	<?php include_once('footer.php'); ?>
</body>
</html>


