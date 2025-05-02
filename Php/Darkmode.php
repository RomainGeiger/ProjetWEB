<?php
// Traitement du thème
if (isset($_GET['theme']) && in_array($_GET['theme'], ['dark', 'light'], true)) {
    setcookie('theme', $_GET['theme'], [
        'expires'  => time() + 60*60*24*365,
        'path'     => '/',
        'samesite' => 'Lax'
    ]);
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

// Détermination du thème courant
$theme = $_COOKIE['theme'] ?? 'light';
$checked = $theme === 'dark' ? 'checked' : '';
?>
<!DOCTYPE html>
<html lang="fr" class="<?= $theme ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= $title ?? 'Mon site'; ?></title>
  <link rel="stylesheet" href="/css/theme.css">
</head>
<body>
<header>
  <h1>Contactez-nous pour vos questions de prise de poids</h1>

  <nav>
    <a href="../index.php">Accueil</a>
    <a href="présentation.php">Présentation</a>
    <a href="programmes.php">Programmes</a>
    <a href="avis.php">Feedback</a>
    <a href="magazin.php">Boutique</a>
    <a href="contact.php">Contact</a>

    <!-- Commutateur de thème sans JavaScript -->
    <form method="get" style="display:inline;">
      <label class="switch">
        <span class="sun">☀️</span>
        <span class="moon">🌙</span>
        <input type="hidden" name="theme" value="<?= $theme === 'dark' ? 'light' : 'dark' ?>">
        <input type="submit" class="input-toggle" value="">
        <span class="slider <?= $checked ?>"></span>
      </label>
    </form>
  </nav>
</header>
