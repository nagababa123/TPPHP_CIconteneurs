<?php
defined('BASEPATH') OR Exit('No direct script access allowed');
?>
<!--La vue V_liste_conteneurs affiche les données grâce à une boucle foreach !-->

<article> 
    <h1>La Liste des tournées de collecte</h1>
</article>
<?php
foreach ($result as $row) {
    ?>
    <p><a href="<?php echo site_url("C_tournee/detail/" . $row['Id']); ?>"><?php echo $row['Nom']; ?></a> (<?php echo $row['JourCollecte']; ?>) </p>
    <?php
    
}

?> 