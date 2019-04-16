<?php
defined('BASEPATH') OR Exit('No direct script access allowed');
?>
<!--La vue V_liste_conteneurs affiche les données grâce à une boucle foreach !-->

<article>                
    <h1>Un projet pilote de borne connectée</h1>

<?php 

        foreach($result as $row) 
        {  
            echo "<p>ID Conteneur : " . $row['Id'] . "</p>";   
            echo "<p>ID tournée : " . $row['TourneeStandardId'] . "</p>";    
            echo "<p>Adresse : " . $row['AddrEmplacement'] . "</p>";    
            echo "<p>Coordonnées : " . $row['LatLng'] . "</p>";    
            echo "<p>RefSigfox : " . $row['RefSigfox'] . "</p>";    
            echo "<p>Volume max. : " . $row['VolumeMax'] . "</p>";      
            echo "<p>Volume actuel :" . $row['VolumeMesureActuel'] . "</p>";
            echo "<p>Dernière collecte : " . $row['DateDerniereCollecte'] . "</p>";   
            echo "<br/>";
        }
?> 
</article>
