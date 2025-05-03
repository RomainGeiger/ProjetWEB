<?php
// Chemins du système de fichiers (pour les includes, requires, etc.)
define('ROOT_PATH', __DIR__);
define('PHP_PATH_FS', ROOT_PATH . '/php');
define('BDB_PATH_FS', ROOT_PATH . '/bdb');
define('CSS_PATH_FS', ROOT_PATH . '/css');

// Déterminer la racine HTTP du projet pour les URLs absolues
function getProjectRoot() {
    // Récupérer le nom du script en cours d'exécution
    $script_filename = $_SERVER['SCRIPT_FILENAME'];
    $document_root = $_SERVER['DOCUMENT_ROOT'];

    // Déterminer le chemin du projet par rapport à la racine du serveur
    $project_path = str_replace($document_root, '', dirname($script_filename));
    
    // Si on est dans un sous-dossier du projet, remonter au dossier parent
    if (strpos($project_path, '/php') !== false) {
        $project_path = dirname($project_path);
    }
    
    // Nettoyer le chemin et assurer qu'il commence par /
    $project_path = '/' . trim($project_path, '/');
    
    // Si on est à la racine du serveur web, retourner simplement /
    if ($project_path == '/' || $project_path == '//') {
        return '';
    }
    
    return $project_path;
}

// URLs absolues (pour les liens, actions de formulaires, etc.)
$project_root = getProjectRoot();
define('BASE_URL', $project_root);
define('PHP_PATH', $project_root . '/php');
define('CSS_PATH', $project_root . '/css');


?>