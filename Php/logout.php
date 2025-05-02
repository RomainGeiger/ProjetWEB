<?php

	session_start(); //Démarrer la session
	if(isset($_SESSION['user_id'])){
		session_unset(); //détruire les variables de sessions
		session_destroy();//détruire la session
		header('Location: ../index.php');
	}

?>
