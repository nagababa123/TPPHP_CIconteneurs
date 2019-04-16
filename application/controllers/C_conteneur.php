<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class C_conteneur extends CI_Controller {

    public function index() {
        $this->load->helper("url");
        $data['title'] = "Le liste de conteneurs";
        // loading model M_conteneur
        $this->load->model('M_conteneur');
        //fetching result by page  using select_all_by_page
        $array_resultat = $this->M_conteneur->select_all_by_page();
        $data['result'] = $array_resultat;




        $page = $this->load->view('conteneurs/V_liste_conteneurs', $data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
    }

    //function pour afficher plus de details
    public function detail($prid) {
        $data['title'] = 'Détail d\'un conteneur';
        $data['heading'] = 'Détail du conteneur n°' . $prid;

        // Appel du modèle
        $this->load->model('M_conteneur');
        $array_resultat = $this->M_conteneur->select_detail_by_conteneur($prid);
        $data['result'] = $array_resultat;



        // Envoie des résultat dans la vue et ajout du template
        $page = $this->load->view('conteneurs/V_detail_conteneur', $data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
    }
    public function search(){
        $data['title'] = 'Résultat recherche';
        $search_name = $this->input->get('search_string'); 
        if ($search_name!= null) { 
            $this->load->model('M_conteneur');
        $array_resultat = $this->M_conteneur->select_search_by_page($search_name);
        $data['result'] = $array_resultat;
        $page = $this->load->view('conteneurs/V_liste_conteneurs', $data, true);
        $this->load->view('commun/V_template', array('contenu' => $page));
            
        }
         else {$this->index();} 
    }

}
