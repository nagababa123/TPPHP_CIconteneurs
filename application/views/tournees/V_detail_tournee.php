<?php
defined('BASEPATH') OR Exit('No direct script access allowed');
?>
<!--La vue V_liste_conteneurs affiche les données grâce à une boucle foreach !-->

<article> 
    <h1>La tournée :<?php echo $result[0]['Nom'] ?> </h1>
    <h2>Jour de collecte :<?php echo $result[0]['JourCollecte'] ?> </h2>
    <?php
    foreach ($result as $row) {
        echo $row['Id'] . "-";
        echo $row['AddrEmplacement'];
        ?>
        <a href="<?php echo site_url("C_conteneur/detail/" . $row['Id']); ?>">plus d'infos</a>
        <?php
        echo "<br/>";
    }

    ?> 
</article>
