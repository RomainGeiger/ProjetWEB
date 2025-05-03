<?php
require_once dirname(__DIR__) . '/config.php';

// Si le formulaire est soumis
if (isset($_POST['EnvoiTheme'])) {
    // Récupération du thème choisi
    $theme = $_POST['Choixtheme'];
    
    // Validation du thème (sécurité)
    if ($theme !== 'sombre' && $theme !== 'clair') {
        $theme = 'clair'; // Thème par défaut si valeur invalide
    }
    
    // Stockage du thème dans un cookie (durée de 30 jours)
    setcookie('theme', $theme, time() + (30 * 24 * 60 * 60), '/');
    
    // Rediriger l'utilisateur vers la page d'origine après le changement
    $retour = isset($_POST['retour']) ? $_POST['retour'] : '/index.php';
    header("Location: $retour");
    exit;
}
?>