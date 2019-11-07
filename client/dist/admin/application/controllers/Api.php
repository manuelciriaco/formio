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

    public function solicitudes_get(){
        $this->response(array('status'=>$this->get("status")));
    }

    public function recetas_post(){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Allow: GET, POST, OPTIONS, PUT, DELETE");

        //Notificar que hay receta disponible. 
        nueva_receta();
        $json = file_get_contents('php://input');
        // Converts it into a PHP object
        $data = json_decode($json);

        $receta = array(
            'uniqueid' => isset($data->uniqueid)?$data->uniqueid:0,
        );     

        //Aqui insert 
        $temp = array(
            'status' => false,
        );
        $this->response($temp);
    }

    public function recetas_put(){
        $p = array('userid'=>$this->put('userid'));
        $this->response($p);
    }  
    
    public function shopper_get(){
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            // should do a check here to match $_SERVER['HTTP_ORIGIN'] to a
            // whitelist of safe domains
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }

        $ret = array(
            'status' => true, 
            'count' => 0, 
            'shopper' => array()
        );
        $sp = $this->db->select('title,imgUrl')->from('shopper')->get()->result_array();
        $ret['count']   = count($sp);
        $ret['shopper'] = (count($sp) > 0) ? $sp : array() ;
        
        $this->response($ret);
    }

    public function cupones_get(){
        $ret = array(
            'status' => true, 
            'count' => 0, 
            'cupones' => array()
        );
        $sp = $this->db->select('title,imgUrl')->from('cupones')->get()->result_array();
        $ret['count']   = count($sp);
        $ret['cupones'] = (count($sp) > 0) ? $sp : array() ;
        
        $this->response($ret);
    }    
}