<!DOCTYPE html>
<html>
	<head>
		<title> Modification d'un enfant </title>
	</head>
	<body>
		<?php
			require("start.php");
			//s'assurer qu'on a bien une adresse de rentrée.
			if(empty($_GET['idenfants']))
			{
				header("Location:gestion_enfant.php");
			}
			// premiere iteration
			$idenfants = $_GET['idenfants'];
			$requete = "SELECT * FROM enfants WHERE idenfants = '$idenfants' ";
			$result = $bddPDO->query($requete);
			
			$data = $result->fetch(PDO::FETCH_ASSOC);	
		?>
			<form action="modif_selected_enfant.php" method="post">
				<fieldset>
					<legend><b>Modifiez Vos Coordonnées</b></legend>
					<table>
					
						<tr><td>Nom: </td><td> <input type="text" name="nomenfant" value="<?php echo $data['nomenfant']; ?>" size="50" maxlength="50"></td></tr>
						<tr><td>Prenom: </td><td> <input type="text" name="prenomenfant" value="<?php echo $data['prenomenfant']; ?>" size="50" maxlength="50"></td></tr>
						<tr><td>Date de naissance: </td><td> <input type="text" name="datedenaissance" value="<?php echo $data['datedenaissance']; ?>" size="50" maxlength="50"></td></tr>
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
			
			// cet else voudrait dire que là ce n'est PAS le button modifier qui a été appuyé, mais le button soumettre du present formulaire.   
			if(isset($_POST['idenfants']) && isset($_POST['nomenfant']) && isset($_POST['prenomenfant']) && isset($_POST['datedenaissance']) )
			{
				$nom = $_POST['nomenfant'];
				$prenom = $_POST['prenomenfant'];
				$datedenaissance = $_POST['datedenaissance'];
				
				$idenfants = $_POST['idenfants']; // le hidden que nous avons recupéré.
				
				/*
				$requete = " UPDATE clients SET nom='$nom', prenom='$prenom', age='$age', adresse='$adresse', ville='$ville', email='$email' WHERE id_client='$id_client' ";
                $result  = $bddPDO->exec($requete); 
				   
				OU ALORS ces 3 étapes suivantes
				*/
				$requete = $bddPDO->prepare('UPDATE enfants SET nomenfant=:nomenfant, prenomenfant=:prenomenfant, datedenaissance=:datedenaissance WHERE idenfants=:idenfants');
				
				$requete->bindvalue(':idenfants', $idenfants);
				$requete->bindvalue(':nomenfant', $nom);
				$requete->bindvalue(':prenomenfant', $prenom);
				$requete->bindvalue(':datedenaissance', $datedenaissance);
				
				$result = $requete->execute();   // la reglè générale c'est que prepare va toujours avec execute() tandis que !prepare toutjours avec exec()
				
				if(!$result)
				{
					echo 'UN problème est survenu, empechant la mise-à-jour de se faire <br>';
				}
				else
				{
					echo 'Bravo ! Vos modifications ont été bien effectuées <br>';
					?>
					<br><a href="gestion_enfant.php"> Retourner à la page principale </a><br><br>
					<?php
				}
			}
		?>
	
	</body>
</html>