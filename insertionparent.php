<?php include('include/entete.inc');
include("start.php");

if(isset($_POST['soumettre']))
			{
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$contact = $_POST['contact'];
				$adresse = $_POST['adresse'];
				
				if(!empty($nom) && !empty($prenom) && !empty($contact)&& !empty($adresse))
				{
					$requete = $bddPDO->prepare('INSERT INTO parents (nom, prenom, contact,adresse) VALUE (?, ?, ?, ?)');
					$result = $requete->execute(array($nom, $prenom, $contact,$adresse));
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
	</body>
	
;	<form action="insertionparent.php" method="post">
		<fieldset>
			<legend><b>Vos Coordonnées</b></legend>
			<table>
				<tr><td>Nom: </td><td> <input type="text" name="nom" size="50" maxlength="50" required></td></tr>
				<tr><td>Prenom: </td><td> <input type="text" name="prenom" size="50" maxlength="50" required></td></tr>
				<tr><td>Contact: </td><td> <input type="text" name="contact" size="50" maxlength="50" required></td></tr>
                <tr><td>Adresse: </td><td> <input type="text" name="adresse" size="50" maxlength="50" required></td></tr>
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