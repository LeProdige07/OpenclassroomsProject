<?php 
try{
	//on se connecte a MySQL
	$mysql = new PDO('mysql:host=localhost; dbname=wedding;charset=utf8', 'root', '',
					[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	
}
catch(Exception $e)
{
	die('Erreur: ' .$e->getMessage());
}
?>