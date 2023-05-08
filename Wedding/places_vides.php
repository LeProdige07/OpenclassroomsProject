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

		
$sqlquery = "select * from invites";
$selectalbinos = $mysql->prepare($sqlquery);
$selectalbinos->execute();
$invites = $selectalbinos->fetchAll();
		$i = 0;
		foreach ($invites as $invite){
			if($invite['presence'] != 'OUI'){
				$i = $i+1;
			}
		}
?>
 <div class="container">
	 <div class="card">
	 <h1> Résultat !</h1>
		 <div class="card-body">
			<b>Nombre de places vides :</b>
			 <?php echo($i . "places"); ?>
			 
			 </div>
		 </div>
			</div>
	</section>
	<?php include_once('footer.php'); ?>
</body>
</html>
