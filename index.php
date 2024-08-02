<?php 

// --------------------------------
// Routeur
// --------------------------------

require_once __DIR__ .'/vendor/autoload.php';     //Pour lancer l'autoload depuis le répertoire du fichier dans lequel on le lance

if( !empty($_GET['page']) ) {

    if($_GET['page'] == 'monument'){
        require_once('controller/monumentController.php');
    }else{ 
        require_once('view/404View.php');
    }

} else {
    require_once('view/homeView.php');
}

