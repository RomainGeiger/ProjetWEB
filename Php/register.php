<?php
session_start();

// Redirection si déjà connecté
if (
    isset($_SESSION['user_id']) ||
    (isset($_COOKIE['user_session']) && !empty($_COOKIE['user_session']))
) {
    header('Location: ../index.php');
    exit;
}

require_once __DIR__ . '/../bdb/connexion.php';

if (!isset($conn) || !($conn instanceof PDO)) {
    // Sécurité : si la connexion n'est pas correcte, on stoppe tout de suite
    die('Connexion BD introuvable.');
}

$erreurs = [];
$champs  = [
    'nom'      => '',
    'prenom'   => '',
    'tel'      => '',
    'email'    => '',
    'sexe'     => '',
    'age'      => ''
];

// Traitement du Post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* 1. Vérification des champs obligatoires */
    foreach ($champs as $k => $v) {
        if (!isset($_POST[$k]) || trim($_POST[$k]) === '') {
            $erreurs[] = "Le champ $k est obligatoire.";
        } else {
            $champs[$k] = trim($_POST[$k]);
        }
    }

    $password  = $_POST['password']  ?? '';
    $password2 = $_POST['password2'] ?? '';

    if ($password !== $password2) {
        $erreurs[] = 'Les mots de passe ne correspondent pas.';
    }
    if (!filter_var($champs['email'], FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = 'Adresse e-mail invalide.';
    }

    try {
        /* 2. Vérifie l'unicité de l'adresse e-mail */
        if (empty($erreurs)) {
            $sql  = 'SELECT 1 FROM utilisateur WHERE adresse_email = ? LIMIT 1';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$champs['email']]);
            if ($stmt->fetchColumn()) {
                $erreurs[] = 'Adresse e-mail déjà utilisée.';
            }
        }

        /* 3. Insère l'utilisateur */
        if (empty($erreurs)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = 'INSERT INTO utilisateur
                    (nom, prenom, numero_de_tel, adresse_email, mot_de_passe, sexe, age)
                    VALUES (:nom, :prenom, :tel, :email, :pwd, :sexe, :age)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':nom'    => $champs['nom'],
                ':prenom' => $champs['prenom'],
                ':tel'    => $champs['tel'],
                ':email'  => $champs['email'],
                ':pwd'    => $hash,
                ':sexe'   => $champs['sexe'],
                ':age'    => $champs['age']
            ]);

            header('Location: login.php?inscription=reussie');
            exit;
        }
    } catch (PDOException $e) {
        $erreurs[] = 'Une erreur est survenue, merci de réessayer plus tard.';
    }
}

// Affiche le formulaire
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css" />
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="inactive underlineHover"><a href="login.php">Connexion</a></h2>
        <h2 class="active">Inscription</h2>

        <?php if ($erreurs): ?>
            <div class="alert">
                <?php foreach ($erreurs as $e) echo "<p>$e</p>"; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <input type="text" name="nom" placeholder="Nom" required
                   value="<?= htmlspecialchars($champs['nom']) ?>" />

            <input type="text" name="prenom" placeholder="Prénom" required
                   value="<?= htmlspecialchars($champs['prenom']) ?>" />

            <input type="tel" name="tel" placeholder="Numéro de téléphone" required
                   value="<?= htmlspecialchars($champs['tel']) ?>" />

            <input type="email" name="email" placeholder="Adresse e-mail" required
                   value="<?= htmlspecialchars($champs['email']) ?>" />

            <input type="password" name="password" placeholder="Mot de passe" required />
            <input type="password" name="password2" placeholder="Vérifier le mot de passe" required />

            <select name="sexe" required>
                <option value="">Sexe</option>
                <option value="1" <?= $champs['sexe']==='1'?'selected':''; ?>>Homme</option>
                <option value="2" <?= $champs['sexe']==='2'?'selected':''; ?>>Femme</option>
                <option value="0" <?= $champs['sexe']==='0'?'selected':''; ?>>Autre</option>
            </select>

            <input type="date" name="age" placeholder="Date de naissance" required
                   value="<?= htmlspecialchars($champs['age']) ?>" />

            <input type="submit" value="S&#39;inscrire" />
        </form>
    </div>
</div>
</body>
</html>