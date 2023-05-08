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
$terme_recherche = strip_tags($_POST['table']);
	
	if(empty($_POST['table'])){
		include_once('errorRecherche.php');
		return;
	}
		$terme_recherche = addslashes($terme_recherche);
$sqlquery = "select * from invites where numeroTable ='".$terme_recherche."'";
$selectalbinos = $mysql->prepare($sqlquery);
$selectalbinos->execute();
$invites = $selectalbinos->fetchAll();
?>
 <div class="container">
	 <div class="card">
	 <h1> Résultat !</h1>
		 <div class="card-body">
			 <h3><b>Table <?php echo($terme_recherche); ?></b></h3>
<?php	foreach ($invites as $invite){
		?>
	
		
		
			
			
				<?php echo($invite['nom']); echo($invite['presence']); ?><br>
			
		
	<?php
	}	
?>
			 </div>
		 </div>
			<?php if(!isset($invite)) : 
			
		include_once('errorRecherche_table.php');	
		
			?>
			<?php endif; ?>
		
			</div>
	</section>
	<?php include_once('footer.php'); ?>
</body>
</html>


