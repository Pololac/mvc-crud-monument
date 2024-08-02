<?php
// --------------------------------
// Vue de la liste des monuments
// --------------------------------
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Liste des monuments</title>
</head>

<body>
    <div class="container">
        <p><a href="?">Revenir à l'accueil</a></p>

        <h1>Liste des monuments</h1>

        <ul>
            <?php foreach( $monuments as $monumentObject ) : ?>
                <li><h2><a href="?page=monument&monument_id=<?=$monumentObject->getId()?>"><?=$monumentObject->getNom()?></a></h2></li>
            <?php endforeach; ?>
        </ul>

        <p><a href="?page=monument&action=create">Ajouter un monument</a></p>
    </div>
</body>
</html>
