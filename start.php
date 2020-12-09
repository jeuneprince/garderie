<?php
	$bddPDO = new PDO('mysql:host=localhost;dbname=garderie','root','mysql');
	$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connexion réussie <br><br>";
?>

