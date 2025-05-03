<?php
require_once dirname(__DIR__) . '/config.php';
require("..\bdb\connexion.php");

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


    <div class="conteneur">

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

        <?php include PHP_PATH_FS . '/footer.php'; ?>
    </div>
</body>
</html>
