<?php
// --------------------------------
// Vue d'un seul monument
// --------------------------------
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?=htmlentities($monument->getNom())?></title>
</head>

<body>
<div class="container">
    <p><a href="?page=monument">Revenir à la liste des monuments</a></p>

    <h1><?=htmlentities($monument->getNom())?></h1>
    <p><b>Pays</b> : <?=htmlentities($monument->getPays())?></p>
    <p><b>Ville</b> : <?=htmlentities($monument->getVille())?></p>
    <p><b>Nombre de visites par an</b> : <?= $monument->getNbVisitesAn() / 1000000 ?> millions </p>

    <a class="btn btn-primary mt-2 mb-4" href="?page=monument&action=update&monument_id=<?=$monument->getId()?>" role="button">Modifier</a>

    <a class="btn btn-primary mt-2 mb-4" href="?page=monument&action=delete&monument_id=<?=$monument->getId()?>" role="button">Supprimer</a>

</div>
</body>
</html>
