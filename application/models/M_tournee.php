<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class M_tournee extends CI_Model {

    public function __construct() {
        parent:: __construct(); // Call the CI_Model constructor         
        $this->load->database(); //Connexion à la BDD 
    }

    public function select_all() {
        $query = $this->db->select('Nom, Id, JourCollecte')
                ->from('tourneestandard')
                ->get();
        return $query->result_array(); //conversion en tableau PHP     
    }

    public function select_detail_by_tournee($idtournee) {
        $query = $this->db->select('conteneur.Id, conteneur.AddrEmplacement, tourneestandard.Nom, tourneestandard.JourCollecte')         
                ->from('conteneur, tourneestandard')         
                ->where('conteneur.TourneeStandardId = tourneestandard.Id')         
                ->where('tourneestandard.Id = '.$idtournee)        
                ->get(); 
        return $query->result_array(); 
    }
}
    