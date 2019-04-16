<?php
defined('BASEPATH') OR Exit('No direct script access allowed');
?>
<!--La vue V_liste_conteneurs affiche les données grâce à une boucle foreach !-->

<article> 
    <form action="<?php echo site_url('C_conteneur/search'); ?>" method="get">     
    <input type="text" name="search_string">     
    <input type="submit" value="Rechercher"> </form>
    <h1>Les Conteneurs</h1>
    <?php
    foreach ($result as $row) {
        echo $row['Id'] . "-";
        echo $row['AddrEmplacement'];
        ?>
        <a href="<?php echo site_url("C_conteneur/detail/" . $row['Id']); ?>">plus d'infos</a>
        <?php
        echo "<br/>";
    }
    echo $this->pagination->create_links();
    ?> 
</article>


