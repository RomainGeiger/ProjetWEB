<?php
session_start();
$servername = 'localhost';
$db_user    = 'root';
$db_pass    = 'root';
$database   = 'projet25_cjm';

try {
    $conn = new PDO(
        "mysql:host=$servername;dbname=$database;charset=utf8",
        $db_user,
        $db_pass
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : '.$e->getMessage());
}

/* --- Traitement du formulaire --- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email    = trim($_POST['adresse_email'] ?? '');
    $password = trim($_POST['mot_de_passe']  ?? '');

    if ($email !== '' && $password !== '') {

        $stmt = $conn->prepare(
            'SELECT id, mot_de_passe
             FROM utilisateur
             WHERE adresse_email = :email
             LIMIT 1'
        );
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            /* Authentification OK */
            $_SESSION['user_id'] = $user['id'];
            header('Location: ../index.php');
            exit;
        }

        /* Mauvais identifiants */
        header('Location: login.html?erreur=1');
        exit;
    }

    /* Champs vides */
    header('Location: login.html?erreur=2');
    exit;
}

/* Accès direct : on renvoie vers le formulaire */
header('Location: login.html');
exit;
?>
