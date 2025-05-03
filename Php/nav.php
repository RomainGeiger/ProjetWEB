<?php session_start(); ?>
<header>
  <h1>Contactez-nous pour vos questions de prise de poids</h1>
  <nav>
  <a href="/ProjetWEB/index.php">Accueil</a>
  <a href="/ProjetWEB/php/presentation.php">Présentation</a>
  <a href="/ProjetWEB/php/programmes.php">Programmes</a>
  <a href="/ProjetWEB/php/avis.php">Feedback</a>
  <a href="/ProjetWEB/php/magazin.php">Boutique</a>
  <a href="/ProjetWEB/php/contact.php">Contact</a>
    <?php 
    if (!isset($_SESSION['user_id'])) {
      echo '<a href="/ProjetWEB/php/register.php">Inscription/Connexion</a>';
    }else{
      echo '<a href="/ProjetWEB/php/logout.php">Déconnexion</a>';
    }
    ?>


  </nav>
</header>