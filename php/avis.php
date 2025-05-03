<?php
require_once dirname(__DIR__) . '/config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Témoignages - Être Gros, C'est Bon pour la Santé !</title>
    <link rel="stylesheet" href="../css/avis.css">
</head>
<?php 
if(isset($_COOKIE["theme"])){
    if ($_COOKIE["theme"] == "sombre"){
        echo '<body class="dark-theme">';
    }
    else{
        echo '<body class="light-theme">';
    }
}
else{
    echo '<body class="light-theme">';
}

    include PHP_PATH_FS . '/nav.php'; ?>  
<div class="container">

    <?php 
        require("..\bdb\connexion.php"); //Etablie une connexion à la base de données

        $reqSQL= "SELECT utilisateur.nom, utilisateur.prenom, utilisateur.age, feedback.feedback FROM feedback INNER JOIN utilisateur ON feedback.id_clients = utilisateur.id;";
		$req = $conn->prepare($reqSQL);
        $req->execute();
				
		$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
			

        foreach($resultat as $value){
            echo '
            <div class="testimonial">
                <h3>'.$value['nom'].' '.$value['prenom'].', '.$value['age'].' ans</h3>
                <p>'.htmlspecialchars($value['feedback']).'</p>
            </div>';

        }


        if(isset($_POST['avis'])){
            $reqSQL="INSERT INTO feedback (id_clients,feedback) VALUES (:id, :feedback)";
            $req = $conn->prepare($reqSQL);
            $req->execute([
                ':id'    => $_SESSION['user_id'],
                ':feedback' => htmlspecialchars($_POST['message']),
            ]);
            header('Location: avis.php');
        }

        $conn=NULL;	//Fermer la connexion
			

    ?>
    <div class="avis">
        <h2>Déposez votre avis !</h2>
    <?php 
        if (!isset($_SESSION['user_id'])) {
            echo "<p> Vous devez être connecté pour saisir un avis !</p>";
        }
        else{
            echo '
                    <form method="post">

                    <label for="message" class="test"><p>Votre témoignage :</p></label>
                    <textarea id="message" name="message" rows="5" placeholder="Racontez votre expérience..." required></textarea>

                    <button type="submit" name="avis">Envoyer</button>
                </form>';
        }
    
    ?>

    </div>
    
</div>
<?php include PHP_PATH_FS . '/footer.php'; ?>
</body>
</html>