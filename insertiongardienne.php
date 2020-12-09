<?php include('include/entete.inc');
include("start.php");

			if(isset($_POST['soumettre']))
			{
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$session = $_POST['session'];
				$trancheage = $_POST['trancheage'];
				
				if(!empty($nom) && !empty($prenom) && !empty($session)&& !empty($trancheage))
				{
					$requete = $bddPDO->prepare('INSERT INTO gardiennes (nom, prenom, session,trancheage) VALUE (?, ?, ?, ?)');
					$result = $requete->execute(array($nom, $prenom, $session,$trancheage));
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
	
;	<form action="insertiongardienne.php" method="post">
		<fieldset>
			<legend><b>Vos Coordonnées</b></legend>
			<table>
				<tr><td>Nom: </td><td> <input type="text" name="nom" size="50" maxlength="50" required></td></tr>
				<tr><td>Prenom: </td><td> <input type="text" name="prenom" size="50" maxlength="50" required></td></tr>
				<tr><td>Session: </td><td> <input type="text" name="session" size="50" maxlength="50" required></td></tr>
                <tr><td>Tranche d'age: </td><td> <input type="text" name="trancheage" size="50" maxlength="50" required></td></tr>
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