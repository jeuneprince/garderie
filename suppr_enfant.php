<!DOCTYPE html>
<html>
	<head>
		<title> Suppression d'un enfant </title>
	</head>

	<body>
		<?php
			require("start.php");
			
			//s'assurer qu'on a bien une adresse de rentrée.
			if(empty($_POST['prenomenfant']) && !isset($_POST['soumettre']))
			{
				header("Location:form_suppr_enfant.php");
			}
			// premiere iteration
			if(isset($_POST['supprimer']))
			{
				$prenom = $_POST['prenomenfant'];
				$requete = "SELECT * FROM enfants WHERE prenomenfant = '$prenom' ";
				$result = $bddPDO->query($requete);
				
				$data = $result->fetch(PDO::FETCH_ASSOC);
				
		?>
					<form action="suppr_enfant.php" method="post">
						<fieldset>
							<legend><b>Supprimez ces Coordonnées ?</b></legend>
							<table>
							
								<tr><td>Nom: </td><td> <?php echo $data['nomenfant']; ?> </td></tr>
								<tr><td>Prenom: </td><td> <?php echo $data['prenomenfant']; ?> </td></tr>
								<tr><td>Age: </td><td> <?php echo $data['datedenaissance']; ?> </td></tr>
								<tr></tr>
								<tr>
									<td> <input type="reset" name="effacer" value="Effacer" size="20"></td>
									<td> <input type="submit" name="soumettre" value="Soumettre" size="20"></td>
									<td> <input type="hidden" name="idenfants" value="<?php echo $data['idenfants']; ?>" size="20"></td>
								</tr>	
							</table>
						</fieldset>
					</form>
		<?php 
				$result->closeCursor(); // pour libérer la connection au serveur tout en permettant à d'autres requettes d'être exécutées.
			
			} // cet else voudrait dire que là ce n'est PAS le button supprimer qui a été appuyé, mais le button soumettre du present formulaire.   
			else
			{
				$idenfants = $_POST['idenfants']; // le hidden que nous avons recupéré.
				
				/* $requete = " DELETE FROM clients WHERE id_client = '$id_client' ";
                   $result  = $bddPDO->exec($requete); 
				   
				   OU ALORS LES 3 LIGNES SUIVANTES     // la reglè générale c'est que prepare va toujours avec execute() tndis que !prepare toutjours avec exec() 
				*/
					$requete = $bddPDO->prepare('DELETE FROM enfants WHERE idenfants=:idenfants');
					$requete->bindvalue(':idenfants', $idenfants);
					$result = $requete->execute();

				if(!$result)
				{
					echo 'Un problème est survenu, empechant la suppression de se faire <br>';
				}
				else
				{
					echo 'Bravo ! votre suppression a bien été effectuée <br>';
		?>
					<br><a href="index.php"> Retourner à la page principale </a><br><br>
		<?php
				}
			}
		?>
        <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
	</body>
</html>