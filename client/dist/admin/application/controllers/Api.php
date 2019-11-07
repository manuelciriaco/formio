<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
		
        $this->load->database();
        $this->load->helper('url');   
        error_reporting(-1);
        ini_set('display_errors', 1); 
        header('Access-Control-Allow-Origin: *');
        
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    }

    public function form_post(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Allow: GET, POST, OPTIONS, PUT, DELETE");

        //Notificar que hay receta disponible. 
        $json = file_get_contents('php://input');
        // Converts it into a PHP object
        $data = json_decode($json);

        $form = array(
            'id_tipo'       => $this->input->get_post('id_form')?$this->input->get_post('id_form'):'',
            'id_form'       => $this->input->get_post('id_form')?$this->input->get_post('id_form'):'',
            'campos_json'   => $this->input->get_post('campos_json')?$this->input->get_post('campos_json'):'',
            'campo1'       => $this->input->get_post('campo1')?$this->input->get_post('campo1'):'',
            'campo2'       => $this->input->get_post('campo2')?$this->input->get_post('campo2'):'',
            'campo3'       => $this->input->get_post('campo3')?$this->input->get_post('campo3'):'',
            'campo4'       => $this->input->get_post('campo4')?$this->input->get_post('campo4'):'',
            'campo5'       => $this->input->get_post('campo5')?$this->input->get_post('campo5'):'',
            'campo6'       => $this->input->get_post('campo6')?$this->input->get_post('campo6'):'',
            'campo7'       => $this->input->get_post('campo7')?$this->input->get_post('campo7'):'',
            'campo8'       => $this->input->get_post('campo8')?$this->input->get_post('campo8'):'',
            'estado'       => $this->input->get_post('estado')?$this->input->get_post('estado'):'',
            'usuario'       => $this->input->get_post('usuario')?$this->input->get_post('usuario'):'',
        );  
        //var_dump($form);
        $r = $this->db->insert('gpc_forms', $form);

        //Aqui insert 
        $temp = array(
            'status' => ($r)?true:false,
        );
        $this->response($temp);
    } 
  
}