<?php
require("..\bdb\connexion.php"); //Etablie une connexion à la base de données

/* Vérification et traitement du POST */
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['nom'], $_POST['prenom'], $_POST['numero_de_tel'],
             $_POST['adresse_email'], $_POST['password'], $_POST['password2'],
             $_POST['sexe'], $_POST['age'])) {

    $nom       = trim($_POST['nom']);
    $prenom    = trim($_POST['prenom']);
    $telephone = trim($_POST['numero_de_tel']);
    $email     = trim($_POST['adresse_email']);
    $pw1       = $_POST['password'];
    $pw2       = $_POST['password2'];
    $sexe      = (int) $_POST['sexe'];
    $age       = (int) $_POST['age'];

    /* Mots de passe identiques ? */
    if ($pw1 !== $pw2) {
        header('Location: register.html?erreur=2');
        exit;
    }

    /* E-mail valide ? */
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: register.html?erreur=4');
        exit;
    }

    /* E-mail déjà utilisé ? */
    $stmt = $mysqli->prepare('SELECT 1 FROM utilisateur WHERE adresse_email = ? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows) {
        $stmt->close();
        header('Location: register.html?erreur=3');
        exit;
    }
    $stmt->close();

    /* Insertion */
    $hashed = password_hash($pw1, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare('INSERT INTO utilisateur
        (nom, prenom, numero_de_tel, adresse_email, mot_de_passe, sexe, age)
        VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssssi',
        $nom, $prenom, $telephone, $email, $hashed, $sexe, $age);

    if (!$stmt->execute()) {
        exit('Erreur d\'insertion : '.$stmt->error);
    }

    $stmt->close();
    $mysqli->close();
    header('Location: login.html?inscription=ok');
    exit;
}

/* Fallback : champs manquants */
header('Location: register.html');
exit;
?>
