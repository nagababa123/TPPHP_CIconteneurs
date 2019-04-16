<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class C_accueil extends CI_Controller {

    public function index() {
        $this->load->helper("url");
        $data['title'] = "Les conteneurs de vêtements";
        $page = $this->load->view('V_accueil', $data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
    }

}
