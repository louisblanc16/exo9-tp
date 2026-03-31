<?php
require_once(__DIR__ . '/../Model/pdo.php');

if (isset($_POST['prenom']) && isset($_POST['nom'])) {
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];

    $resultat =$dbPDO->prepare("INSERT INTO etudiants(prenom, nom, classe_id) VALUES (:prenom, :nom, :classe_id)");
    $req = $resultat->execute([
        'prenom'=> $prenom,
        'nom'=>$nom,
        'classe_id'=> 1
    ]);

    if ($req){
        echo "L'étudiant a bien été ajouté";
    } else {
        echo "Erreur lors de l'ajout de l'étudiant";
    }
}else {
    echo "Aucune donnée reçue";
}
?>

</br>

<a href="../index.php">Retour à la page principale</a>