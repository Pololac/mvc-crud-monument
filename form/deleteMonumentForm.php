<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Confirmer suppression</title>
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col-5">


            <?php

            if(isset($success)){?>

                <p style='color:green'><?=$success?></p>
                <p><a href="?page=monument">Retour à la liste des monuments</a></p><?php

            } else {
                if (isset($error)){?>
                <p style="color:red"><?=$error->getMessage()?></p><?php ;
                }?>

                <h3>Êtes-vous sûr de vouloir supprimer <strong><?=$monument->getNom()?></strong>?</h3>

                <form method="post">
                    <input type="submit" class="btn btn-primary mt-2 mb-4" name="confirm" value = "OUI">
                    <input type="submit" class="btn btn-primary mt-2 mb-4" name="confirm" value = "NON">
                </form>

            <?php }?>

        </div>
    </div>
</div>

</body>
</html>