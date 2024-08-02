<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Formulaire modification</title>
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col-5">
            <h3>Modifier les informations du monument</h3>

            <?php

            if(isset($success)){?>
                <p style='color:green'><?=$success?></p><?php ;
            } else {
                if (isset($error)){?>
                <p style="color:red"><?=$error->getMessage()?></p><?php ;
                }
            }

            ?>


            <form method="post">
                <div class="form-group">
                    <label for="nom">Nom du monument : </label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?=htmlentities($_POST['nom'] ?? $monument->getNom() ?? '')?>"/>
                </div>
                <div class="form-group">
                    <label for="pays">Pays du monument : </label>
                    <input type="text" class="form-control" id="pays" name="pays" value="<?=htmlentities($_POST['pays'] ?? $monument->getPays() ?? '')?>"/>
                </div>
                <div class="form-group">
                    <label for="ville">Ville où il se trouve : </label>
                    <input type="text" class="form-control" id="ville" name="ville" value="<?=htmlentities($_POST['ville'] ?? $monument->getVille() ?? '')?>"/>
                </div>
                <div class="form-group">
                    <label for="nbVisitesAn">Nombre de visites annuelles : </label>
                    <input type="number" class="form-control" id="nbVisitesAn" name="nbVisitesAn" value="<?=htmlentities($_POST['nbVisitesAn'] ?? $monument->getNbVisitesAn() ?? '')?>"/>
                </div>    
                <button type="submit" class="btn btn-primary text-white mt-2 mb-4">Mettre à jour</button>

            </form>
        </div>
    </div>

    <p><a href="?page=monument">Revenir à la liste des monuments</a></p>

</div>

</body>
</html>