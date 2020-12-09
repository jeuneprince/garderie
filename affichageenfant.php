<<?php include('include/entete.inc');?>
<body class="homepage">

<section id="bienvenue">
    <div class="container">
        <body>
		<?php
			include("start.php");
			$requete = 'SELECT idenfants,nomenfant,prenomenfant,datedenaissance,contact,adresse FROM enfants INNER JOIN parents where idparents=parents_idparents';
			$result = $bddPDO->query($requete);
			if(!$result)
			{
				echo 'La récuperation des données a rencontré des problèmes <br>';
			}
			else
			{
				$nbre_enfant = $result->rowCount();
			}
		?>

		<h3>Tous nos enfants : </h3>
		<h4>Nous avons <?php echo $nbre_enfant. ' enfants'; ?> </h4>
		<table border="1">
			<tr>
				<th>Numéro de l'enfant</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Date de naissance</th>
                <th>Contact</th>
				<th>Adresse</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>

			<?php
				$enfants = $result->fetchAll();
				foreach($enfants as $enfant)
				{
                    echo '<tr>';
                    echo '<td> '.$enfant['idenfants'].' </td> <td> '.$enfant['nomenfant'].'</td> <td> '.$enfant['prenomenfant'].' </td> <td> '.$enfant['datedenaissance'].' </td>  <td> '.$enfant['contact'].'</td> <td> '.$enfant['adresse'].' </td>';
                    ?>
                    <td> <a href="modif_selected_enfant.php?idenfants=<?php echo $enfant['idenfants']; ?>"> Modifier </a></td> <td><a href="suppr_selected_enfant.php?idenfants=<?php echo $enfant['idenfants']; ?>"> Supprimer </a></td>
                    <?php
                    echo '</tr>';
				}
			?>
		</table>
		<?php   $result->closeCursor() ?>
        <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
        <td><button><a href="insertion.php">inscrire un enfant !</a></button></td>
	</body>
    </div>
    </section>

<?php include('include/pied-page.inc');?>