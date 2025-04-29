<?php
// Connexion BDD
require_once __DIR__ . '/../bdb/connexion.php'; 

session_start();

$erreurs = [];
$email   = '';

/* Traitement du post */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['adresse_email'] ?? '');
    $password = trim($_POST['mot_de_passe']  ?? '');

    if ($email === '' || $password === '') {
        $erreurs[] = 'Tous les champs sont requis.';
    } else {
        // Recherche de l'utilisateur
        $stmt = $pdo->prepare('SELECT id, mot_de_passe FROM utilisateur WHERE adresse_email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: index.php');
            exit;
        }

        $erreurs[] = 'Utilisateur ou mot de passe incorrect.';
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

      <!-- Affichage des erreurs -->
      <?php if ($erreurs): ?>
        <div class="alert">
          <?php foreach ($erreurs as $e) echo "<p>$e</p>"; ?>
        </div>
      <?php endif; ?>

      <!-- Formulaire -->
      <form action="login.php" method="post">
        <input type="email" name="adresse_email" class="fadeIn second" placeholder="Adresse e-mail" value="<?=htmlspecialchars($email)?>" required />
        <input type="password" name="mot_de_passe" class="fadeIn third" placeholder="Mot de passe" required />
        <input type="submit" class="fadeIn fourth" value="Se connecter" />
      </form>
    </div>
  </div>
</body>
</html>
