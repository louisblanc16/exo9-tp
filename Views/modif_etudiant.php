<?php
require_once(__DIR__ . '/../Model/pdo.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
else{
    echo "Aucun ID";
    exit();
}

$resultat = $dbPDO->prepare("SELECT * FROM etudiants WHERE id = :id");
$resultat->execute(['id' => $id]);

$etudiant = $resultat->fetch();
?>

<h1>Modifier l'étudiant</h1>

<form method="post">
    <input type="hidden" name="id" value="<?= $etudiant['id']; ?>">
    <label>Prénom :</label>
    <input type="text" name="prenom" value="<?= $etudiant['prenom']; ?>">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= $etudiant['nom']; ?>">
    <input type="submit" value="Modifier">
</form>

<?php
    if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['id'])) {
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $id= $_POST['id'];

        $resultat = $dbPDO->prepare("
        UPDATE etudiants 
        SET prenom = :prenom, nom = :nom 
        WHERE id = :id");

        $reponse=$resultat->execute([
        'prenom'=>$prenom,
        'nom'=> $nom,
        'id'=> $id]);

        if ($reponse) {
            echo "Modification réussie";
        }
        else {
            echo "Erreur lors de la modification";
        }
    }


?>