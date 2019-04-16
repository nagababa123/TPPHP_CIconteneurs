<?php
defined('BASEPATH') OR Exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <link href="<?php echo base_url("assets/css/conteneurs.css"); ?>" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div id="conteneur">
            <header>
                <h1>Ramassage des points de collecte </h1>
            </header>

            <nav>
                <ul>
                    <li><a href="<?php echo site_url(); ?>">Accueil</a></li>
                    <li><a href="<?php echo site_url("C_tournee"); ?>">Les tournées de collecte</a></li>
                    <li><a href="<?php echo site_url("C_conteneur"); ?>">Les conteneurs</a></li>
                </ul>
            </nav>
            <section>
                <?php echo $contenu; ?>
            </section>

            <footer>
                <p>l Partenaires l Recrutement l Contact l Crédits & mentions légales l</p>
            </footer>
        </div>    
    </body>
</html>