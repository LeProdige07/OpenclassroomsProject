<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion des invités - formulaire</title>
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<a href="index.php" class="logo" >Retour</a>

	</header>
	<section class="baniere" id="baniere">
		<div class="card">
		<div class="container">
		<h1>Connectez-vous</h1>
		<form action="postConnexion.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="email" class="form-label">Nom d'utilisateur</label>
				<input type="text" class="form-control" id="email" name="email" aria-describedby="title-help">
				<div id="email-help" class="form-text">Saississez votre nom d'utilisateur !</div>
			</div>
			<div class="mb-3">
			<label for="password" class="form-label">Mot de passe</label>
			<input type="password" class="form-control" id="password" name="password">
		</div>
			<button type="submit" class="btn btn-primary">Envoyer</button>
		</form>
		<br/>
	</div>
			</div>
	</section>
		<?php include_once('footer.php'); ?>
	
</body>
</html>