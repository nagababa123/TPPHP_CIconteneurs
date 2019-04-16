<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Conteneur extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_conteneur');
    }

    public function index_get($id = '') {

        if ($id === '') { // on renvoie la liste des conteneurs 
            $results = $this->M_conteneur->select_all();
            $this->response($results, REST_Controller::HTTP_OK);
        } else { // on renvoie le détail du conteneur 
            $results = $this->M_conteneur->select_detail_by_conteneur($id);
            if (count($results) != 0) {

                $this->response($results, REST_Controller::HTTP_OK);
            } else {

                $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post() {
        $dto = $this->_post_args['dto'];
        $dto = (array) json_decode($dto);

        $results = $this->M_conteneur->insert($dto);

        $this->response($results[0], REST_Controller::HTTP_CREATED);
    }

    public function index_delete($id = '') {
        if ($id === '') { // on delete la liste des conteneurs 
            $this->response($message = array('affected_rows' => 'Aucune ligne supprimé'), REST_Controller::HTTP_BAD_REQUEST);
        } else { // on verifié que le détail du conteneur existe
            $results = $this->M_conteneur->delete($id);
            if ($results === 1) {
                $this->response($message = array('affected_rows' => 'La ligne ' . $id . ' a bien ete supprimer.'), REST_Controller::HTTP_OK);
            } else {
                $this->response($message = array('affected_rows' => 'La ligne ' . $id . 'n existe pas dans la base de donnees.'), REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_put($id = '') {
        if ($id === '') {
            $this->response($results = array('error_message' => 'Aucune ligne mise a jour'), REST_Controller::HTTP_BAD_REQUEST);
        } else {

            $dto = $this->_put_args['dto'];
            $dto = (array) json_decode($dto);

            $resultsGet = $this->M_conteneur->select_detail_by_conteneur($id);
            if ($resultsGet != NULL) {
                $results = $this->M_conteneur->update($dto, $id);
                $this->response($results[0], REST_Controller::HTTP_OK);
            } else {
                $this->response($results = array('error_message' => 'La ligne ' . $id . ' n existe pas'), REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function search_get($search_string = '') {
        if ($search_string === '') {
            $this->response($results = array('error_message' => 'paramètre manquant'), REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $results = $this->M_conteneur->select_search($search_string);
            if (count($results) != 0) {

                $this->response($results, REST_Controller::HTTP_OK);
            } else {

                $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

}
