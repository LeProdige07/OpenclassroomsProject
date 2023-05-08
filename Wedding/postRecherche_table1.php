<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion des invités - Recherche</title>
<link href="bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include_once('header1.php'); ?>
	<section class="baniere" id="baniere">

<?php 


include_once('clientmysql.php'); 
$terme_recherche = strip_tags($_POST['table']);
	
	if(empty($_POST['table'])){
		include_once('errorRecherche1.php');
		return;
	}
	if(!get_magic_quotes_gpc()){
		$terme_recherche = addslashes($terme_recherche);
	}
$sqlquery = "select * from invites where numeroTable ='".$terme_recherche."'";
$selectalbinos = $mysql->prepare($sqlquery);
$selectalbinos->execute();
$invites = $selectalbinos->fetchAll();
?>
 <div class="container">
	 <div class="card">
	 <h1> Résultat !</h1>
		 <div class="card-body">
			 <b>Table <?php echo($terme_recherche); ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Présence</b><br>
<?php	foreach ($invites as $invite){
		?>
	
		
		
			
				<?php echo($invite['nom']);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo($invite['presence']); ?><br>
			
		
	<?php
	}	
?>
			 </div>
		 </div>
			<?php if(!isset($invite)) : 
			
		include_once('errorRecherche_table2.php');	
		
			?>
			<?php endif; ?>
		
			</div>
	</section>
	<?php include_once('footer.php'); ?>
</body>
</html>


