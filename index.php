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
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="section">
        <h1>Etudiants</h1>
            <?php foreach($etudiants as $etudiant){ ?>
                <p><?=$etudiant['prenom'];?> <?=$etudiant['nom']; ?></p>
                <a href="Views/modif_etudiant.php?id=<?= $etudiant['id']; ?>">Modifier</a>
                <a href="Views/suppression_etudiant.php?id=<?= $etudiant['id']; ?>">Supprimer</a>
            <?php } ?>

        <h1>Classes</h1>
            <?php foreach($classes as $classe){ ?>
                <p><?=$classe['libelle'];?></p>
            <?php } ?>

        <h1>Professeurs</h1>
            <?php foreach($profs as $prof){ ?>
                <p><?=$prof['prenom'];?> <?=$prof['nom']; ?></p>
            <?php } ?>

        <h2>Ajouter une matière</h2>

            <form action="Views/nouvelle_matiere.php" method="post">
                <label>Libellé : </label>
                <input type="text" name="libelle">
                <input type="submit" value="Valider">
            </form>

        <h2>Ajouter un étudiant</h2>
            <form action = "Views/nouvel_etudiant.php" method= "post">
                <label>Prénom : </label>
                <input type="text" name="prenom">
                <label>Nom : </label>
                <input type="text" name="nom">

                <input type= "submit" value="Valider">
            </form>
    </div>
    </body>


</html>