<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

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
			// $this->load->model('tweets');
			$this->load->helper('text');             
			$this->load->helper('user_helper');             
			$this->load->helper('string');             
		}
	}

	public function index(){
		$data['headertitle'] = "Profile Class";
		$data['main_menu'] = "info";
		$data['menu'] = "";
		$data['class'] = $this->admin->get_class_info()->row();
		$data['members'] = $this->admin->get_total_member()->num_rows();

		$this->load->view('info/v_info', $data);
	}

	public function settings(){
		$data['headertitle'] = "Setting Info";
		$data['main_menu'] = "settings";
		$data['menu'] = "";
		$data['class'] = $this->admin->get_class_info()->row();

		$this->load->view('info/v_settinginfo', $data);
	}

	public function update_profile_class(){
		$class_name = $this->input->post('class_name');
		$school = $this->input->post('school');
		$years = $this->input->post('years');
		$email = $this->input->post('email');
		$instagram = $this->input->post('instagram');
		$link_instagram = $this->input->post('link_instagram');
		$link_group_wa = $this->input->post('link_group_wa');

		$updated_by = $this->session->userdata('id_user');

		$update['class'] = $class_name;
		$update['school'] = $school;
		$update['years'] = $years;
		$update['email'] = $email;
		$update['instagram'] = $instagram;
		$update['link_instagram'] = $link_instagram;
		$update['link_group_wa'] = $link_group_wa;
		$update['update_by_id_user'] = $updated_by;

		$this->admin->update_profile_class($update);
	}
}