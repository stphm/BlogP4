<?php

// Inclusion des fichiers pincipaux
include_once '_config/config.php';
include_once '_config/db.php';
include_once '_functions/functions.php';

include_once '_classes/Authors.php';
include_once '_classes/Articles.php';


$var = Articles::getAllArticles();
debug($var);
exit;

// Définition de la page courante 
if (isset($_GET['page']) AND !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home'; 
}

//Array contenant toutes les pages 
$allPages = scandir('controllers/');

// Vérification de l'éxistence de la page 
if (in_array($page . '_controller.php' . $allPages)) {
    
    // Inclusion de la page 
    include_once 'models/' .$page. '_model.php';
    include_once 'controllers/' .$page. 'controller.php';
    include_once 'views/' .$page. 'view.php';
} else {
    echo "Erreur 404";
}