<!DOCTYPE html>
<html>
	<head>
		<title> Enregistrement des données </title>
	</head>

	<body>
		<form action="modif_gardienne.php" method="post">
		<fieldset>
			<legend><b>Saisissez le prenom dont vous voulez modifier les coordonnées</b></legend>
			<table>
				<tr><td>Prenom: </td><td> <input type="text" name="prenom" size="50" maxlength="50"></td></tr>
				<tr></tr>
				<tr>
					<td> <input type="reset" name="effacer" value="Effacer" size="20"></td>
					<td> <input type="submit" name="modifier" value="Modifier" size="20"></td>
                    <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
				</tr>
			</table>
		</fieldset>
	</form>
	</body>
</html>