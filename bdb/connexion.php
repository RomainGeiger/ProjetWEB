<?php	
	$servername ='localhost'; 
	$username ='root'; 
	$password ='root'; 
	$database ='projet25_cjm';
	

	try{
		$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}
	catch (PDOException $e) {
		die('Erreur de connexion : '.$e->getMessage());
	}
	
?>