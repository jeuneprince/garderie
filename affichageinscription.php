<<?php include('include/entete.inc');?>
<body class="homepage">

<section id="bienvenue">
    <div class="container">
        <?php
        include("start.php");
        $requete = 'SELECT * FROM inscriptions';
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
        
        <h4>Nous avons <?php echo $nbre_gardienne. ' inscrits'; ?> </h4>
        <table border="1">
            <tr>
                <th>Numéro de l'inscription</th>
                <th>Date inscription</th>
                <th>ID enfant</th>
                <th>ID Gardienne</th>
            </tr>

            <?php
            $inscriptions = $result->fetchAll();
            foreach($inscriptions as $inscription)
            {
                echo '<tr>';
                echo '<td> '.$inscription['idinscriptions'].' </td> <td> '.$inscription['dateincription'].'</td> <td> '.$inscription['enfants_idenfants'].' </td> <td> '.$inscription['gardiennes_idgardiennes'].' </td> ';
                ?>
               <?php
                echo '</tr>';
            }
            ?>
        </table>
        <?php   $result->closeCursor() ?>
        <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
        <td><button><a href="inscription.php">inscrire un enfant !</a></button></td>
</body>
</div>
</section>

<?php include('include/pied-page.inc');?>