<?php

use App\Model\Monument;
use App\Model\MonumentManager;

// --------------------------------
// Contrôleur des monuments
// --------------------------------


if (!empty($_GET['action'])) {

    if ($_GET['action'] == "create") {
        
        if(!empty($_POST)) {    //Vérifie si le formulaire a été envoyé
            
            if(!empty($_POST['nom']) && !empty($_POST['pays']) && !empty($_POST['ville']) && ($_POST['nbVisitesAn']) != "") {   // Vérifie si toutes les données du formulaires sont renseignées (pour les nombres, la condition est formulée différemment )
                try {
                    $monument = new Monument;   // Si tt renseigné, création d'un nouvel objet
                    $monument->hydrate($_POST['nom'], $_POST['pays'], $_POST['ville'], $_POST['nbVisitesAn']);   // Hydratation de l'objet avec les données envoyées ds POST
                    MonumentManager::create($monument);     // Stocke l'objet dans la base de données
                    $success = "Le monument a été ajouté avec succès";     //Stocke un message de success

                } catch(Exception $error) {}  //Capture les exceptions et les stocke dans une variable
                
            } else {
                
                $error = new Exception ('Tous les champs sont obligatoires');
            }
        }
        
        require_once 'form/createMonumentForm.php';        //Il faut créer les variables $success & $error avant l'affichage du formulaire pour qu'il puisse les afficher 


    } elseif ($_GET['action'] == "update") {

        if(!empty($_GET['monument_id'])) {

            $monument = MonumentManager::getOne($_GET['monument_id']);

            if(!empty($_POST['nom']) && !empty($_POST['pays']) && !empty($_POST['ville']) && ($_POST['nbVisitesAn']) != "") {   // Vérifie si toutes les données du formulaires sont renseignées (pour les nombres, la condition est formulée différemment )

                try {
                    
                    $monument->hydrate($_POST['nom'], $_POST['pays'], $_POST['ville'], $_POST['nbVisitesAn']);   // Hydratation de l'objet avec les données envoyées ds POST
                    MonumentManager::update($monument);     // Stocke l'objet dans la base de données
                    $success = "Le monument a été mis à jour avec succès";     //Stocke un message de success

                } catch(Exception $error) {}  //Capture les exceptions et les stocke dans une variable
                
            } else {
                
                $error = new Exception ('Tous les champs sont obligatoires');
            }
        }
        
        require_once 'form/updateMonumentForm.php';

    } elseif ($_GET['action'] == "delete") {
        
        if(!empty($_GET['monument_id'])) {
            
            try {
                $monument = MonumentManager::getOne($_GET['monument_id']);

                if(!empty($_POST['confirm'])){
                    if(($_POST['confirm']) == 'OUI'){
                        try {
                            MonumentManager::delete($monument);
                            $success = "Le monument a été supprimé avec succès";     //Stocke un message de success
                        } catch(Exception $error) {}  //Capture les exceptions et les stocke dans une variable
                        
                    } else {
                        header('Location:?page=monument&monument_id=' .$monument->getId()); //Redirection vers la vue détaillée du monument
                        exit;
                    }

                } require_once 'form/deleteMonumentForm.php';

            } catch(Exception $error) {
                require_once 'view/404View.php';
            }

        } else {
            require_once 'view/404View.php';
        }
    }

} elseif (!empty($_GET['monument_id']) ){
  
    $monument = MonumentManager::getOne( intval($_GET['monument_id']) );
    require_once 'view/monumentView.php';

} else { 
    $monuments = MonumentManager::getAll();
    require_once 'view/monumentsView.php';
}