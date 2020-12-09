<!DOCTYPE html>
<html>
	<head>
		<title> Modification d'un parent </title>
	</head>

	<body>
		<?php
			require("start.php");
			
			//s'assurer qu'on a bien une adresse de rentrée.
			if(empty($_POST['prenom']))
			{
				header("Location:form_modif_parent.php");
			}
			// premiere iteration
			if(isset($_POST['modifier']))
			{
				
				$prenom = $_POST['prenom'];
				$requete = "SELECT * FROM parents WHERE prenom = '$prenom'";
				$result = $bddPDO->query($requete);
				
				$data = $result->fetch(PDO::FETCH_ASSOC);
				
		?>
					<form action="modif_parent.php" method="post">
						<fieldset>
							<legend><b>Modifiez Vos Coordonnées</b></legend>
							<table>
							
								<tr><td>Nom: </td><td> <input type="text" name="nom" value="<?php echo $data['nom']; ?>" size="50" maxlength="50"></td></tr>
								<tr><td>Prenom: </td><td> <input type="text" name="prenom" value="<?php echo $data['prenom']; ?>" size="50" maxlength="50"></td></tr>
								<tr><td>Contact: </td><td> <input type="text" name="contact" value="<?php echo $data['contact']; ?>" size="50" maxlength="50"></td></tr>
                                <tr><td>Adresse: </td><td> <input type="text" name="adresse" value="<?php echo $data['adresse']; ?>" size="50" maxlength="50"></td></tr>

                                <tr></tr>
								<tr>
									<td> <input type="reset" name="effacer" value="Effacer" size="20"></td>
									<td> <input type="submit" name="soumettre" value="Soumettre" size="20"></td>
									<td> <input type="hidden" name="idparents" value="<?php echo $data['idparents']; ?>" size="20"></td>
								</tr>	
							</table>
						</fieldset>
					</form>
		<?php 
				$result->closeCursor(); // pour libérer la connection au serveur tout en permettant à d'autres requettes d'être exécutées.
			
			} // cet else voudrait dire que là ce n'est PAS le button modifier qui a été appuyé, mais le button soumettre du present formulaire.   
			elseif(isset($_POST['idparents']) && isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['contact'])&& isset($_POST['adresse']))
			{
			    $idparents=$_POST['idparents'];
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$contact = $_POST['contact'];
				$adresse = $_POST['adresse']; // le hidden que nous avons recupéré.

				/*
				$requete = " UPDATE clients SET nom='$nom', prenom='$prenom', age='$age', adresse='$adresse', ville='$ville', email='$email' WHERE id_client='$id_client' ";
                $result  = $bddPDO->exec($requete);

				OU ALORS ces 3 étapes suivantes
				*/
				$requete = $bddPDO->prepare('UPDATE parents SET nom=:nom, prenom=:prenom, contact=:contact, adresse=:adresse WHERE idparents=:idparents');

				$requete->bindvalue(':idparents', $idparents);
				$requete->bindvalue(':nom', $nom);
				$requete->bindvalue(':prenom', $prenom);
				$requete->bindvalue(':contact', $contact);
                $requete->bindvalue(':adresse', $adresse);
				$result = $requete->execute();   // la reglè générale c'est que prepare va toujours avec execute() tndis que !prepare toutjours avec exec()
				
				if(!$result)
				{
					echo 'UN problème est survenu, empechant la mise-à-jour de se faire <br>';
				}
				else
				{
					echo 'Bravo ! Vos modifications ont été bien effectuées <br>';
					?>
					<br><a href="index.php"> Retourner à la page principale </a><br><br>
					<?php
				}
			}
			else
			{
				echo 'Modifiez vos coordonnées <br>';
			}
		?>
        <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
	</body>
</html>