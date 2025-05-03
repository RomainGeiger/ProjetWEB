<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once dirname(__DIR__) . '/bdb/connexion.php';  

// récupère le rôle si connecté
$isAdmin = false;
if (isset($_SESSION['user_id'])) {
    $stmt = $conn->prepare('SELECT estAdmin FROM utilisateur WHERE id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    $isAdmin = (bool) $stmt->fetchColumn();
}
?>
<header>
  <h1>Contactez‑nous pour vos questions de prise de poids</h1>
  <nav>
    <a href="/ProjetWEB/index.php">Accueil</a>
    <a href="/ProjetWEB/php/presentation.php">Présentation</a>
    <a href="/ProjetWEB/php/programmes.php">Programmes</a>
    <a href="/ProjetWEB/php/avis.php">Feedback</a>
    <a href="/ProjetWEB/php/magazin.php">Boutique</a>
    <a href="/ProjetWEB/php/contact.php">Contact</a>

    <?php if (!$isAdmin && !isset($_SESSION['user_id'])) : ?>
        <a href="/ProjetWEB/php/register.php">Inscription/Connexion</a>
    <?php elseif (!$isAdmin) : ?>
        <a href="/ProjetWEB/php/logout.php">Déconnexion</a>
    <?php else : ?>
        <a href="/ProjetWEB/php/admin.php">Admin</a>
        <a href="/ProjetWEB/php/logout.php">Déconnexion</a>
    <?php endif; ?>
  </nav>
</header>
