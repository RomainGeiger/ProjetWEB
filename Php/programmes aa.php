<?php
<<<<<<< HEAD
require_once dirname(__DIR__) . '/config.php';
?>

<!Doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Programme </title>
        <meta name="Lettre" content="Programme">
        <link rel="stylesheet" href="../css/programmes.css">	
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
=======
require("..\bdb\connexion.php");
// session_start() supposé déjà lancé dans le header

// Insertion du programme choisi
if (isset($_POST['avis']) && isset($_SESSION['user_id'])) {
    $programmeChoisi = trim($_POST['message']);

    // Vérification que l'entrée est valide
    $programmesDisponibles = ['1' => 'Obèselix', '2' => 'Omar Simpson', '3' => 'Wargros'];
    if (!array_key_exists($programmeChoisi, $programmesDisponibles)) {
        die('Programme invalide.');
    }

    // Éviter les doublons : un seul programme par utilisateur
    $check = $conn->prepare("SELECT COUNT(*) FROM programme WHERE id_clients = :id");
    $check->execute([':id' => $_SESSION['user_id']]);
    if ($check->fetchColumn() > 0) {
        die('Vous avez déjà un programme enregistré.');
    }

    // Insertion
    $reqSQL = "INSERT INTO programme (id_clients, programme) VALUES (:id, :programme)";
    $req = $conn->prepare($reqSQL);
    $req->execute([
        ':id' => $_SESSION['user_id'],
        ':programme' => $programmesDisponibles[$programmeChoisi]
    ]);
    header('Location: programmes.php');
    exit;
}

// Récupération des programmes commandés
$reqSQL = "SELECT utilisateur.nom, utilisateur.prenom, utilisateur.age, programme.programme 
           FROM programme 
           INNER JOIN utilisateur ON programme.id_clients = utilisateur.id";
$req = $conn->prepare($reqSQL);
$req->execute();
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);

$conn = null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programme</title>
    <link rel="stylesheet" href="../css/programmes.css">
    <link rel="stylesheet" href="../css/theme.css">
</head>
<body>
    <div class="conteneur">
        <?php
        $title = 'Accueil';
        include $_SERVER['DOCUMENT_ROOT'].'/ProjetWEB/Php/Darkmode.php';
        ?>

>>>>>>> 786feb03664338be690f0cbaf57367a6baac0587
        <main>
            <?php
            $programmes = [
                ['id' => '1', 'nom' => 'Obèselix', 'image' => 'obèselix.png', 'jours' => 30, 'repas' => 120, 'encas' => 120, 'prix' => 600],
                ['id' => '2', 'nom' => 'Omar Simpson', 'image' => 'omarsimpson.jpeg', 'jours' => 60, 'repas' => 240, 'encas' => 120, 'prix' => 1200],
                ['id' => '3', 'nom' => 'Wargros', 'image' => 'wargros.png', 'jours' => 120, 'repas' => 480, 'encas' => 240, 'prix' => 2200],
            ];

            foreach ($programmes as $prog) {
                echo '
                <article class="art'.$prog['id'].'">
                    <img src="../images/'.htmlspecialchars($prog['image']).'" alt="'.htmlspecialchars($prog['nom']).'">
                    <h1>Programme '.$prog['id'].' : '.htmlspecialchars($prog['nom']).'</h1>
                    <ul>
                        <li>Durée : '.$prog['jours'].' jours</li>
                        <li>Repas : '.$prog['repas'].'</li>
                        <li>En-cas : '.$prog['encas'].' (à manger à n\'importe quelle heure)</li>
                        <li>Prix : '.$prog['prix'].' euros</li>
                    </ul>
                    <div class="resume">
                        <h2>Nos conseils :</h2>
                        <p>
                            Mangez les en-cas en dehors des repas.<br>
                            Limitez votre sommeil à moins de 7h pour éviter de brûler trop de calories.<br>
                            Réduisez votre activité physique pour favoriser la prise de poids.<br>
                            Hydratez-vous uniquement lorsque vous en ressentez le besoin.
                        </p>
                    </div>
                </article>';
            }
            ?>
        </main>

        <aside class="aside1"></aside>
        <aside class="aside2"></aside>

        <div class="container">
            <h2>Clients et leur programme</h2>
            <?php
            foreach ($resultat as $value) {
                echo '
                <div class="testimonial">
                    <h3>'.htmlspecialchars($value['nom']).' '.htmlspecialchars($value['prenom']).', '.htmlspecialchars($value['age']).' ans</h3>
                    <p>'.htmlspecialchars($value['programme']).'</p>
                </div>';
            }
            ?>

            <div class="programes">
                <h2>Quel programme désirez-vous ?</h2>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <p>Vous devez être connecté pour commander un programme !</p>
                <?php else: ?>
                    <form method="post">
                        <label for="message" class="test">Nos Programmes :</label>
                        <select name="message" id="message" required>
                            <option value="" disabled selected>-- Choisissez un programme --</option>
                            <option value="1">1 = Obèselix</option>
                            <option value="2">2 = Omar Simpson</option>
                            <option value="3">3 = Wargros</option>
                        </select>
                        <button type="submit" name="avis">Envoyer</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

<<<<<<< HEAD








                
            <form class="formLetter" method="post" action="#">
                <fieldset>
                    <legend>Commande</legend>
                    
                    <!-- Nom -->
                    <label for="nom" class="test">Nom :</label>
                    <input class="spécial" type="text" name="nom" id="nom" placeholder="Votre nom">
                    <br><br>
                    
                    <!-- Prénom -->
                    <label for="prenom" class="test">Prénom :</label>
                    <input class="spécial" type="text" name="prenom" id="prenom" value="">
                    <br><br>
            
                    <!-- Numéro de téléphone -->
                    <label for="tel" class="test">Numéro de téléphone :</label>
                    <input class="spécial" type="tel" name="tel" id="tel" value="+33">
                    <br><br>
                    
                    <!-- Courriel -->
                    <label for="courriel" class="test">Courriel :</label>
                    <input class="spécial" type="email" name="courriel" id="courriel">
                    <br><br>
            
                    <!-- Publicité -->
                    <label for="pub" class="test">Pub :</label>
                    <input class="spécial" type="radio" name="pub" id="oui">
                    <label for="oui" class="test">Oui, j'accepte</label>
                    <input class="spécial" type="radio" name="pub" id="non">
                    <label for="non" class="test">Non je refuse</label>
                    <br><br>
            
                    <!-- Programme -->
                    <label for="programme" class="test">Programme :</label>
                    <input class="spécial" type="checkbox" name="programme" id="Obèselix">
                    <label for="Obèselix" class="test">Obèselix</label>
                    <input class="spécial" type="checkbox" name="programme" id="OmarSimpson">
                    <label for="OmarSimpson" class="test">Omar Simpson</label>
                    <input class="spécial" type="checkbox" name="programme" id="Wargros">
                    <label for="Wargros" class="test">Wargros</label>
                    <br><br>
            
                    <!-- Soumettre et Réinitialiser -->
                    <input class="spécial" type="submit" name="Envoyer" id="soumission" value="Soumettre">
                    <input class="spécial" type="reset" id="reinitialiser" value="Réinitialiser">

                </fieldset>
            </form>
            
            <?php include PHP_PATH_FS . '/footer.php'; ?>
=======
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
>>>>>>> 786feb03664338be690f0cbaf57367a6baac0587
    </div>
</body>
</html>
