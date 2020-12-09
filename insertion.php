<?php include('include/entete.inc');
include("start.php");

			if(isset($_POST['soumettre']))
			{
				$nom = $_POST['nomenfant'];
				$prenom = $_POST['prenomenfant'];
				$datedenaissance = $_POST['datedenaissance'];
				$idparents = $_POST['idparents'];

				if(!empty($nom) && !empty($prenom) && !empty($datedenaissance)&& !empty($idparents))
				{
					$requete = $bddPDO->prepare('INSERT INTO enfants (nomenfant, prenomenfant, datedenaissance,parents_idparents) VALUE (?, ?, ?, ?)');
					$result = $requete->execute(array($nom, $prenom, $datedenaissance,$idparents));

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
	<form action="insertion.php" method="post">
		<fieldset>
			<legend><b>Vos Coordonnées</b></legend>
			<table>
				<tr><td>Nom: </td><td> <input type="text" name="nomenfant" size="50" maxlength="50" required></td></tr>
				<tr><td>Prenom: </td><td> <input type="text" name="prenomenfant" size="50" maxlength="50" required></td></tr>
				<tr><td>Date de naissance: </td><td> <input type="text" name="datedenaissance" size="50" maxlength="50" required></td></tr>
                <tr><td>ID parent: </td><td> <input type="number" name="idparents" size="50" maxlength="50" required></td></tr>
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