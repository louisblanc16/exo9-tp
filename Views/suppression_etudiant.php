<?php
    require_once(__DIR__ . '/../Model/pdo.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "Aucun ID reçu";
        exit();
    }
    $resultatVerification = $dbPDO->prepare("SELECT * FROM etudiants WHERE id = :id");
    $resultatVerification->execute(['id' => $id]);
    $etudiant = $resultatVerification->fetch();

    if (!$etudiant)
        {
        echo "Aucun étudiant trouvé";
        exit();}

    $resultatSuppression = $dbPDO->prepare("DELETE FROM etudiants WHERE id = :id");
    $reponse = $resultatSuppression->execute(['id' => $id]);

    if ($reponse){
        echo "Suppression de l'étudiant réussie";
    }
    else {
        echo "Erreur lors de la suppression";
    }
?>