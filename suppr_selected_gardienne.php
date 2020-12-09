<!DOCTYPE html>
<html>
<head>
    <title> Suppression d'une gardienne </title>
</head>
<body>
<?php
require("start.php");
//s'assurer qu'on a bien une adresse de rentrée.
if(empty($_GET['idgardiennes']))
{
    header("Location:gestion_parent.php");
}
// premiere iteration
$idgardiennes = $_GET['idgardiennes'];
$requete = "SELECT * FROM gardiennes WHERE idgardiennes = '$idgardiennes' ";
$result = $bddPDO->query($requete);

$data = $result->fetch(PDO::FETCH_ASSOC);
?>
<form action="suppr_selected_gardienne.php" method="post">
    <fieldset>
        <legend><b>Supprimez Vos Coordonnées</b></legend>
        <table>
            <tr><td>Nom: </td><td> <input type="text" name="nom" value="<?php echo $data['nom']; ?>" size="50" maxlength="50"></td></tr>
            <tr><td>Prenom: </td><td> <input type="text" name="prenom" value="<?php echo $data['prenom']; ?>" size="50" maxlength="50"></td></tr>
            <tr><td>Session: </td><td> <input type="text" name="session" value="<?php echo $data['session']; ?>" size="50" maxlength="50"></td></tr>
            <tr><td>Tranche d'age: </td><td> <input type="text" name="trancheage" value="<?php echo $data['trancheage']; ?>" size="50" maxlength="50"></td></tr>

            <tr></tr>
            <tr>
                <td> <input type="reset" name="effacer" value="Effacer" size="20"></td>
                <td> <input type="submit" name="soumettre" value="Soumettre" size="20"></td>
                <td> <input type="hidden" name="idgardiennes" value="<?php echo $data['idgardiennes']; ?>" size="20"></td>
            </tr>
        </table>
    </fieldset>
</form>
<?php
$result->closeCursor(); // pour libérer la connection au serveur tout en permettant à d'autres requettes d'être exécutées.

// cet else voudrait dire que là ce n'est PAS le button modifier qui a été appuyé, mais le button soumettre du present formulaire.
if(isset($_POST['idgardiennes']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['session']) && isset($_POST['trancheage']) )
{
    $idgardiennes=$_POST['idgardiennes'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $session = $_POST['session'];
    $trancheage = $_POST['trancheage']; // le hidden que nous avons recupéré.

    /*
    $requete = " UPDATE clients SET nom='$nom', prenom='$prenom', age='$age', adresse='$adresse', ville='$ville', email='$email' WHERE id_client='$id_client' ";
    $result  = $bddPDO->exec($requete);

    OU ALORS ces 3 étapes suivantes
    */
   
    $requete = $bddPDO->prepare('DELETE FROM gardiennes WHERE idgardiennes=:idgardiennes');
    $requete->bindvalue(':idgardiennes', $idgardiennes);
    $result = $requete->execute();

    $result = $requete->execute();   // la reglè générale c'est que prepare va toujours avec execute() tandis que !prepare toutjours avec exec()

    if(!$result)
    {
        echo 'UN problème est survenu, empechant la mise-à-jour de se faire <br>';
    }
    else
    {
        echo 'Bravo ! Votre suppression a été bien effectuée <br>';
        ?>
        <br><a href="gestion_gardienne.php"> Retourner à la page principale </a><br><br>
        <?php
    }
}
?>

</body>
</html>