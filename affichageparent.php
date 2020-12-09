<<?php include('include/entete.inc');?>
<body class="homepage">

<section id="bienvenue">
    <div class="container">
	<body>
		<?php
			include("start.php");
			$requete = 'SELECT idparents,nom,prenom,contact, adresse FROM parents ORDER BY idparents ASC';
			$result = $bddPDO->query($requete);
			if(!$result)
			{
				echo 'La récuperation des données a rencontré des problèmes <br>';
			}
			else
			{
				$nbre_parent = $result->rowCount();
			}
		?>

		<h3>Tous nos parents : </h3>
		<h4>Nous avons <?php echo $nbre_parent. ' parents'; ?> </h4>
		<table border="1">
			<tr>
				<th>Numéro du parent</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Contact</th>
                <th>Adresse</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>

			<?php
				$parents = $result->fetchAll();
				foreach($parents as $parent)
				{
                    echo '<tr>';
                    echo '<td> '.$parent['idparents'].' </td> <td> '.$parent['nom'].'</td> <td> '.$parent['prenom'].' </td> <td> '.$parent['contact'].' </td>  <td> '.$parent['adresse'].'</td></td>';
                    ?>
                    <td> <a href="modif_selected_parent.php?idparents=<?php echo $parent['idparents']; ?>"> Modifier </a></td> <td><a href="suppr_selected_parent.php?idparents=<?php echo $parent['idparents']; ?>"> Supprimer </a></td>
                    <?php
                    echo '</tr>';
				}
			?>
		</table>
		<?php   $result->closeCursor() ?>
        <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
        <td><button><a href="insertionparent.php">inscrire un parent !</a></button></td>
	</body>
    </div>
    </section>

<?php include('include/pied-page.inc');?>