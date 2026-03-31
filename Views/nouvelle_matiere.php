<?php
require_once(__DIR__ . '/../Model/pdo.php');

if(isset($_POST['libelle'])){
    $libelle =$_POST['libelle'];

    $resultat=$dbPDO->prepare("INSERT INTO matiere(lib) VALUES (:lib)");
    $req=$resultat->execute([
        'lib' => $libelle
    ]);

    if($req) {
        echo "La matière a bien été ajoutée";
    }else{
        echo "Erreur lors de l'ajout de la matière";
    }
} else{
    echo "Aucune donnée reçue";
}

?>

</br>

<a href="../index.php">Retour à la page principale</a>