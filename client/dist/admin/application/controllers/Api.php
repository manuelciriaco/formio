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
            'id_tipo'       => isset($data->id_tipo)?$data->id_tipo:'',
            'campos_json'   => isset($data->campos_json)?$data->campos_json:'',
            'campo1'       => isset($data->campo1)?$data->campo1:'',
            'campo2'       => isset($data->campo2)?$data->campo2:'',
            'campo3'       => isset($data->campo3)?$data->campo3:'',
            'campo4'       => isset($data->campo4)?$data->campo4:'',
            'campo5'       => isset($data->campo5)?$data->campo5:'',
            'campo6'       => isset($data->campo6)?$data->campo6:'',
            'campo7'       => isset($data->campo7)?$data->campo7:'',
            'campo8'       => isset($data->campo8)?$data->campo8:'',
            'estado'       => isset($data->estado)?$data->estado:'',
            'usuario'       => isset($data->usuario)?$data->usuario:'',
        );  
        
        $r = $this->db->insert('gpc_forms', $form);

        //Aqui insert 
        $temp = array(
            'status' => ($r)?true:false,
        );
        $this->response($temp);
    } 
  
}