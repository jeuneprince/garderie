<!DOCTYPE html>
<html>
	<head>
		<title>Afficher les enfants </title>
	</head>

	<body>
		<?php
			include("start.php");

			$requete = 'SELECT idenfants,nomenfant,prenomenfant,datedenaissance,adresse FROM enfants INNER JOIN parents where idparents=parents_idparents';
			$result = $bddPDO->query($requete);

			if(!$result)
			{
				echo 'La récuperation des données a rencontré des problèmes <br>';
			}
			else
			{
				$nbre_enfants = $result->rowCount();
			}
		?>

		<h3>Tous nos enfants : </h3>
		<h4>Nous avons <?php echo $nbre_enfants. ' enfants'; ?> </h4>
		<table border="1">
			<tr>
				<th>Numéro du enfant</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Date de naissance</th>
				<th>Adresse</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>

			<?php
				$enfants = $result->fetchAll();
				foreach($enfants as $enfant)
				{
					echo '<tr>';
						  echo '<td> '.$enfant['idenfants'].' </td> <td> '.$enfant['nomenfant'].'</td> <td> '.$enfant['prenomenfant'].' </td> <td> '.$enfant['datedenaissance'].' </td> <td> '.$enfant['adresse'].' </td>';
						  ?>
								<td> <a href="modif_selected_enfant.php?idenfants=<?php echo $enfant['idenfants']; ?>"> Modifier </a></td> <td><a href="suppr_selected_enfant.php?idenfants=<?php echo $enfant['idenfants']; ?>"> Supprimer </a></td>
						  <?php
					echo '</tr>';
					
				}
			?>
		
		</table>
		<?php   $result->closeCursor() ?>
        <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
	</body>
</html>