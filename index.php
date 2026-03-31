<?php
    require_once(__DIR__ . '/Model/pdo.php');
    $resultatEtudiants = $dbPDO->prepare("SELECT * FROM etudiants");
    $resultatEtudiants->execute();
    $etudiants = $resultatEtudiants->fetchAll();

    $resultatClasses = $dbPDO->prepare("SELECT * FROM classes");
    $resultatClasses->execute();
    $classes = $resultatClasses->fetchAll();

    $resultatProfs = $dbPDO->prepare("SELECT * FROM professeurs");
    $resultatProfs->execute();
    $profs = $resultatProfs->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="UTF-8">
        <title>Junia</title>
    </head>

    <body>
        <h1>Etudiants</h1>
            <?php foreach($etudiants as $etudiant){ ?>
                <p><?=$etudiant['prenom'];?> <?=$etudiant['nom']; ?></p>
            <?php } ?>

        <h1>Classes</h1>
            <?php foreach($classes as $classe){ ?>
                <p><?=$classe['libelle'];?></p>
            <?php } ?>

        <h1>Professeurs</h1>
            <?php foreach($profs as $prof){ ?>
                <p><?=$prof['prenom'];?> <?=$prof['nom']; ?></p>
            <?php } ?>

    </body>


</html>