<?php include('include/entete.inc');
include("start.php");

if(isset($_POST['soumettre']))
{
    $enfant = $_POST['enfants_idenfants'];
    $gardienne = $_POST['gardiennes_idgardiennes'];


    if(!empty($enfant) && !empty($gardienne) )
    {
        $requete = $bddPDO->prepare('INSERT INTO inscriptions (enfants_idenfants,gardiennes_idgardiennes) VALUE (?, ?)');
        $result = $requete->execute(array($enfant, $gardienne));
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
            <body>
	<form action="inscription.php" method="post">
    <fieldset>
        <legend><b>Vos Coordonnées</b></legend>
        <table>
            <tr><td>ID enfant: </td><td> <input type="number" name="enfants_idenfants" size="50" maxlength="50" required></td></tr>
            <tr><td>ID gardienne: </td><td> <input type="number" name="gardiennes_idgardiennes" size="50" maxlength="50" required></td></tr>
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