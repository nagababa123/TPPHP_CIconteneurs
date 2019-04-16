<?php

defined('BASEPATH') OR Exit('No direct script access allowed');

class M_conteneur extends CI_Model {

    public function __construct() {
        parent:: __construct(); // Call the CI_Model constructor         
        $this->load->database(); //Connexion à la BDD 
    }

    public function select_all() {
        $query = $this->db->select('Id, AddrEmplacement')
                ->from('conteneur')
                ->get();
        return $query->result_array(); //conversion en tableau PHP     
    }

    public function insert($dto) {
        $this->db->insert('conteneur', $dto);
        $last_id = $this->db->insert_id();
        return $this->select_detail_by_conteneur($last_id);
    }

    public function delete($id) {
        $this->db->where('Id', $id);
        $this->db->delete('conteneur');
        return $this->db->affected_rows($id);
    }

    public function update($dto, $prid) {
        $this->db->where('Id', $prid);
        $this->db->update('conteneur', $dto);
        return $this->select_detail_by_conteneur($prid);
    }

    public function select_all_by_page() {
// chargement de la librairie "pagination"  
        $this->load->library('pagination');
// Config de la pagination 
        $config_p['base_url'] = site_url('C_conteneur/index/');
        $config_p['total_rows'] = $this->db->from('conteneur')->count_all_results();
        $config_p['per_page'] = 10;
        $this->pagination->initialize($config_p);
//Requête paginée : SELECT * FROM conteneur LIMIT 10, 0 
        $query = $this->db->select('Id, AddrEmplacement')->from('conteneur')
                        ->limit($config_p['per_page'], $this->uri->segment(3))->get();
        return $query->result_array();
    }

    public function select_detail_by_conteneur($prmid) {
        $query = $this->db->select('*')
                ->from('conteneur')
                ->where("Id = $prmid")
                ->get();
        return $query->result_array();
    }

    public function select_search_by_page($search) {
        //$this->db->like('AddrEmplacement', $search)
        $this->load->library('pagination');

        $config_p['base_url'] = site_url('C_conteneur/search/');
        $config_p['total_rows'] = $this->db->select('*')//Requête paginée : SELECT * FROM conteneur LIMIT 10, 0
                ->from('conteneur')
                ->like('AddrEmplacement', $search)
                ->count_all_results();
        $config_p['reuse_query_string'] = TRUE; //Avec pagination des résultats de recherche
        $config_p['per_page'] = 5;
        $this->pagination->initialize($config_p);

        $query = $this->db->select('*')//Requête paginée : SELECT * FROM conteneur LIMIT 10, 0
                ->from('conteneur')
                ->like('AddrEmplacement', $search)
  
                ->limit($config_p['per_page'], $this->uri->segment(3))
                ->get();
        return $query->result_array();
    }

    public function select_search($search_string) {
        $query = $this->db->select("*")->from("conteneur")->like("AddrEmplacement", $search_string)->get();
        
        return $query->result_array();
    }

}
