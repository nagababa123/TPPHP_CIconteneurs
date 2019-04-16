<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class C_tournee extends CI_Controller {

    public function index() {
        $this->load->helper("url");
        $data['title'] = "Le liste de conteneurs";
        // loading model M_conteneur
        $this->load->model('M_tournee');
        //fetching result by page  using select_all_by_page
        $array_resultat = $this->M_tournee->select_all();
        $data['result'] = $array_resultat;




        $page = $this->load->view('tournees/V_liste_tournees', $data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
    }
    public function detail(){
        $this->load->helper("url");
        $data['title'] = "Detail";
        // loading model M_conteneur
        $this->load->model('M_tournee');
        //fetching result by page  using select_all_by_page
        $array_resultat = $this->M_tournee->select_detail_by_tournee($this->uri->segment(3));
        $data['result'] = $array_resultat;




        $page = $this->load->view('tournees/V_detail_tournee', $data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
    }
}
