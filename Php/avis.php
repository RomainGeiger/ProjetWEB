<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Témoignages - Être Gros, C'est Bon pour la Santé !</title>
    <link rel="stylesheet" href="../css/avis.css">
    <link rel="stylesheet" href="../css/theme.css">
</head>
<body>

    <?php
    $title = 'Accueil';
    include $_SERVER['DOCUMENT_ROOT'].'/ProjetWEB/Php/Darkmode.php';
    ?>

<div class="container">

    <?php 
        require("..\bdb\connexion.php"); //Etablie une connexion à la base de données
        //session_start(); le header fait déjà un session_start pour gérer l'affichage de l'option d'inscription/connexion

        $reqSQL=
        "SELECT utilisateur.nom, utilisateur.prenom, utilisateur.age, feedback.feedback FROM feedback INNER JOIN utilisateur ON feedback.id_clients = utilisateur.id;";
			$req = $conn->prepare($reqSQL);
            $req->execute();
				
			$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
			$conn=NULL;	//Fermer la connexion

            foreach($resultat as $value){
                echo '
                <div class="testimonial">
                    <h3>'.$value['nom'].' '.$value['prenom'].', '.$value['age'].' ans</h3>
                    <p>'.$value['feedback'].'</p>
                </div>';

            }
			

    ?>
    <div class="avis">
        <h2>Déposez votre avis !</h2>
    <?php 
        if (!isset($_SESSION['user_id'])) {
            echo "<p> Vous devez être connecté pour saisir un avis !</p>";
        }
        else{
            echo '
                    <form action="submit-review.php" method="post">

                    <label for="message" class="test"><p>Votre témoignage :</p></label>
                    <textarea id="message" name="message" rows="5" placeholder="Racontez votre expérience..." required></textarea>

                    <button type="submit">Envoyer</button>
                </form>';
        }
    
    ?>

    </div>
    
</div>
<footer class="footer">
    <dl>
        <dt>Téléphone :</dt>
        <dd> (+33) (0)3 22 88 99 63</dd>
        <dt> Adresse :</dt>
        <dd> Gourmang & CO
        -
        Institut Santé <br>
        de l'art de manger équilibré <br>
        2 Rue de Marthe <br>
        80500 Montdidier </dd>
    </dl>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2583.4086902754784!2d2.5847180920388624!3d49.646598271309735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7c1c6a9871dc7%3A0x6a6bb891382827e8!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732617040481!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <ul class="formLink">
        <li><a class="formLink" href="magazin.php">Visitez notre boutique en ligne</a></li>
            <li><a class="formLink" href="contact.php">Contactez-nous </a></li>
            <li><a class="formLink" href="login.php">Connectez-vous! </a></li>
    
    </ul>
</ul>
    </footer>
</body>
</html>