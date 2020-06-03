<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tweet extends CI_Controller {

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

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id_user')){
			redirect('auth');
		}
		else {
			$this->load->model('admin');
			$this->load->helper('text');             
			$this->load->helper('string');             
		}
	}

	public function index(){
		$data['headertitle'] = "Tweet";
		$data['main_menu'] = "tweet";
		$data['menu'] = "";

		$this->load->view('tweet/v_tweet', $data);
	}
}