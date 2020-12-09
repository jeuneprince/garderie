<<?php include('include/entete.inc');?>
<body class="homepage">

<section id="bienvenue">
    <div class="container">
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
				$nbre_gardienne = $result->rowCount();
			}
		?>

		<h3>Toutes nos gardiennes : </h3>
		<h4>Nous avons <?php echo $nbre_gardienne. ' gardiennes'; ?> </h4>
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
                    echo '<td> '.$gardienne['idgardiennes'].' </td> <td> '.$gardienne['nom'].'</td> <td> '.$gardienne['prenom'].' </td> <td> '.$gardienne['session'].' </td>  <td> '.$gardienne['trancheage'].'</td></td>';
                    ?>
                    <td> <a href="modif_selected_gardienne.php?idgardiennes=<?php echo $gardienne['idgardiennes']; ?>"> Modifier </a></td> <td><a href="suppr_selected_gardienne.php?idgardiennes=<?php echo $gardienne['idgardiennes']; ?>"> Supprimer </a></td>
                    <?php
                    echo '</tr>';
				}
			?>
		</table>
		<?php   $result->closeCursor() ?>
        <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
        <td><button><a href="insertiongardienne.php">inscrire une gardienne !</a></button></td>
	</body>
</div>
</section>

<?php include('include/pied-page.inc');?>