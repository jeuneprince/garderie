<?php include('include/entete.inc');
include("start.php");

if(isset($_POST['soumettre']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];
    $gardiennes_idgardiennes = $_POST['gardiennes_idgardiennes'];
    if(!empty($nom) && !empty($prenom) && !empty($commentaire)&& !empty($note)&& !empty($gardiennes_idgardiennes))
    {
        $requete = $bddPDO->prepare('INSERT INTO commentaires (nom, prenom, commentaire,note,gardiennes_idgardiennes ) VALUE (?, ?, ?, ?, ?)');
        $result = $requete->execute(array($nom, $prenom, $commentaire,$note, $gardiennes_idgardiennes));
        if(!$result)
        {
            echo ' Un problème est survenu, l\'enregistrement n\'a pas ou être effectué ';
        }
        else
        {
            echo '<script type="text/javascript"> alert("Vous êtes bien enregistré") </script>';
        }
    }
    else
    {
        echo 'Tous les champs sont requis !';
    }
}
?>
    <body class="homepage">
    <section id="bienvenue">
        <div class="container">
	<form action="contact.php" method="post">
    <fieldset>
        <legend><b>Vos Coordonnées</b></legend>
        <table>
            <tr><td>Nom: </td><td> <input type="text" name="nom" size="50" maxlength="50" required></td></tr>
            <tr><td>Prenom: </td><td> <input type="text" name="prenom" size="50" maxlength="50" required></td></tr>
            <tr><td>commentaire: </td><td> <input type="text" name="commentaire" size="50" maxlength="2000" required></td></tr>
            <tr><td>note: </td><td> <input type="number" name="note" size="50" maxlength="3" required></td></tr>
            <tr><td>Id gardienne: </td><td> <input type="number" name="gardiennes_idgardiennes" size="50" maxlength="3" required></td></tr>
            <tr></tr>
            <tr>
                <td> <input type="reset" name="effacer" value="Effacer" size="20"></td>
                <td> <input type="submit" name="soumettre" value="Soumettre" size="20"></td>
                <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
            </tr>

        </table>
    </fieldset>
</form>
    </body>
    </div>
    </section>

<?php include('include/pied-page.inc');?>