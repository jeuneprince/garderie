<!DOCTYPE html>
<html>
	<head>
		<title>Afficher les gardiennes </title>
	</head>

	<body>
		<?php 
			include("start.php");
			
			$requete = 'SELECT idgardiennes,nom,prenom,session,trancheage FROM gardiennes ORDER BY idgardiennes ASC';
			$result = $bddPDO->query($requete);
			
			if(!$result)
			{
				echo 'La récuperation des données a rencontré des problèmes <br>';
			}
			else
			{
				$nbre_gardiennes = $result->rowCount();
			}
		?>
		
		<h3>Tous nos gardiennes : </h3>
		<h4>Nous avons <?php echo $nbre_gardiennes. ' gardiennes'; ?> </h4>
		<table border="1">
            <tr>
                <th>Numéro de la gardienne</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Session</th>
                <th>Tranche d'age</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
			
			<?php 
				$gardiennes = $result->fetchAll();
				foreach($gardiennes as $gardienne)
				{
					echo '<tr>';
						  echo '<td> '.$gardienne['idgardiennes'].' </td> <td> '.$gardienne['nom'].'</td> <td> '.$gardienne['prenom'].' </td> <td> '.$gardienne['session'].' </td>  <td> '.$gardienne['trancheage'].'</td> ';
						  ?>
								<td> <a href="modif_selected_gardienne.php?idgardiennes=<?php echo $gardienne['idgardiennes']; ?>"> Modifier </a></td> <td><a href="suppr_selected_gardienne.php?idgardiennes=<?php echo $gardienne['idgardiennes']; ?>"> Supprimer </a></td>
						  <?php
					echo '</tr>';
					
				}
			?>
		
		</table>
		<?php   $result->closeCursor() ?>
        <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
	</body>
</html>