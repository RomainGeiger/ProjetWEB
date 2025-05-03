<?php
session_start();

// Redirection si déjà connecté
if (isset($_SESSION['user_id']) || (!empty($_COOKIE['user_session']))) {
    header('Location: ../index.php');
    exit;
}

require __DIR__ . '/../bdb/connexion.php';

if (!isset($conn) || !($conn instanceof PDO)) {
    http_response_code(500);
    die('Connexion BD introuvable.');
}

$erreurs = [];
$email   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['adresse_email'] ?? '');
    $password = trim($_POST['mot_de_passe']   ?? '');

    if ($email === '' || $password === '') {
        $erreurs[] = 'Tous les champs sont requis.';
    }

    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = 'Adresse e‑mail invalide.';
    }

    if (empty($erreurs)) {
        try {
            $stmt = $conn->prepare('SELECT id, mot_de_passe FROM utilisateur WHERE adresse_email = ? LIMIT 1');
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $erreurs[] = 'Erreur interne, réessayez plus tard.';
        }

        if (empty($erreurs)) {
            if ($user && password_verify($password, $user['mot_de_passe'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: ../index.php');
                exit;
            }
            $erreurs[] = 'Utilisateur ou mot de passe incorrect.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/register.css" />
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="active">Connexion</h2>
        <h2 class="inactive underlineHover"><a href="register.php">Inscription</a></h2>

        <?php if ($erreurs): ?>
            <div class="alert">
                <?php foreach ($erreurs as $e): ?>
                    <p><?= htmlspecialchars($e) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" novalidate>
            <input type="email" name="adresse_email" class="fadeIn second" placeholder="Adresse e‑mail" value="<?= htmlspecialchars($email) ?>" required />
            <input type="password" name="mot_de_passe" class="fadeIn third" placeholder="Mot de passe" required />
            <input type="submit" class="fadeIn fourth" value="Se connecter" />
        </form>
    </div>
</div>
</body>
</html>
