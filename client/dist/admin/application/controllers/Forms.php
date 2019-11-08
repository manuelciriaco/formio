<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    function __Construct(){
        parent::__Construct ();
        $this->load->database(); // load database
        $this->load->model('Answers'); // load model
    }


	public function index()
	{
        $this->data = array(
			'content' => 'forms/list_view',
		);
		$this->load->view('includes/template', $this->data); 
    }
    
    public function list(){
        $this->load->view('forms/list_view');
    }

    public function answers($id){

        $data = $this->Answers->getAnswers($id);
//        $data = array(
//          'data' => $result
//        );

        $this->load->view('forms/answers', compact('data'));

    }
}
