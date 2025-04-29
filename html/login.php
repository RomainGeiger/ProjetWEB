<?php
session_start();
require("..\bdb\connexion.php"); //Etablie une connexion à la base de données

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
