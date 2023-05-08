<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion des invités - connexion</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
</head>

<body>
	
<?php 
include_once('clientmysql.php');

$utilisateur= strip_tags($_POST['email']);
$password =   strip_tags($_POST['password']);
	
	if(empty($_POST['email']) || empty($_POST['password']) ){
		include_once('errorConnexion.php');
		return;
	}

		$utilisateur = addslashes($utilisateur);
		$password = addslashes($password);

$sqlquery = "select * from utilisateur";
$selectalbinos = $mysql->prepare($sqlquery);
$selectalbinos->execute();
$users = $selectalbinos->fetchAll();

foreach ($users as $user){
	
	if($user['email'] === $utilisateur && $user['password'] === $password){
		$test = 1;
	}
}
	

?>

<?php if(isset($test)) :  ?>

	
		<section class="baniere" id="baniere">
		<div class="contenu">
			<h2>connnexion réussie !</h2>
<?php if($utilisateur === 'admin@gmail.com' && $password === 'admin') : ?>
			<a href="administrateur.php" class="btn2">Administrateur</a>
			
<?php else : ?>
			<a href="utilisateur.php" class="btn1">Utilisateur</a>
			<?php endif; ?>

		</div>
	</section>
<?php else : ?>
	<?php include_once('errorConnexion2.php'); ?>
	<?php endif; ?>
	
	<?php $test = 1;  ?>
	
	<?php include_once('footer.php'); ?>
</body>
</html>