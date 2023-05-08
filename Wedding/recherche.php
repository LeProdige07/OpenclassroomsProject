<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion des invités - formulaire</title>
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php include_once('header.php'); ?>
	<section class="baniere" id="baniere">
		<div class="card">
		<div class="container">
		<h1>Rechercher un Invité</h1>
		<form action="postrecherche.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="nom" class="form-label">Nom de l'invité</label>
				<input type="text" class="form-control" id="nom" name="nom" aria-describedby="title-help">
				<div id="email-help" class="form-text">Saississez le nom en majuscule !</div>
			</div>
			<button type="submit" class="btn btn-primary">Envoyer</button>
		</form>
		<br/>
	</div>
		</div>
	</section>
	<hr>
	<?php include_once('footer.php'); ?>
</body>
</html>