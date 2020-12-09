<<?php include('include/entete.inc');?>
<body class="homepage">

<section id="bienvenue" >
    <div class="container" >
        <body>
        <?php
        include("start.php");
        $requete = 'SELECT nomfete, nomcadeau, nomenfant, prenomenfant FROM cadeaux INNER JOIN enfants where idenfants=enfants_idenfants';
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

        <table border="1">
            <tr>
                <th>Fete</th>
                <th>Cadeau</th>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>

            <?php
            $cadeaux = $result->fetchAll();
            foreach($cadeaux as $cadeau)
            {
                echo '<tr>';
                echo '<td> '.$cadeau['nomfete'].'</td> <td> '.$cadeau['nomcadeau'].' </td> <td> '.$cadeau['nomenfant'].'</td> <td> '.$cadeau['prenomenfant'].' </td>';
                ?>
                                <?php
                echo '</tr>';
            }
            ?>
        </table>
        <?php   $result->closeCursor() ?>
        <td><button><a href="index.php">Revenir a la page d'accueil !</a></button></td>
        </body>
    </div>
</section>

<?php include('include/pied-page.inc');?>