<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

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
			$this->load->helper('user_helper');             
		}
	}

	public function index(){
		$data['headertitle'] = "Member";
		$data['main_menu'] = "class";
		$data['menu'] = "members";

		$this->load->view('class/members/v_members', $data);
	}

	public function get_members(){
		$search = $this->input->post('search');
		$page = $this->input->post('page');

		$dataPerPage = 10;
		if(empty($page)) {
			$noPage = 1;
		}
		else {
			$noPage = $page;
		}
		$offset = ($noPage - 1) * $dataPerPage;

		$where['status'] = 1;

		if (!empty($search)) {
			$like['name'] = $search;
		}
		else {
			$like = NULL;
		}
		$data['list_members'] = $this->admin->get_data_cond($where,$like,'name','ASC',$offset,$dataPerPage,'tbl_user')->result();

		$data['noPage'] = $noPage;
		$data['offset'] = $offset;

		$this->load->view('class/members/members', $data);
	}

	public function paging_members(){
		// $gender = $this->input->post('gender');
		// $status = $this->input->post('status');
		$search = $this->input->post('search');
		$page = $this->input->post('page');

		$dataPerPage = 10;
		if(empty($page)) {
			$noPage = 1;
		}
		else {
			$noPage = $page;
		}

		// if (empty($gender&&$status)) {
		// 	$where['status'] = 1;
		// }else{
		// 	$where = array(
		// 		'status' => $status,
		// 		'gender' => $gender
		// 	);
		// }
		$where['status'] = 1;

		if (!empty($search)) {
			$like['name'] = $search;
		}
		else {
			$like = NULL;
		}
		$jumData = $this->admin->get_paging_cond($where,$like,'tbl_user')->num_rows();
		$data['jumData'] = $jumData;
		$data['jumPage'] = ceil($jumData/$dataPerPage);
		$data['noPage'] = $noPage;

		$this->load->view('class/members/paging_members', $data);
	}

	public function member($id){
		$id_user = base64_decode($id);

		$check = $this->admin->check_user($id_user);

		if (empty($check->num_rows())) {
			redirect('classes');
		}else{
			$user = $check->row();
			$data['headertitle'] = $user->name; 
			$data['main_menu'] = 'members'; 
			$data['menu'] = '';
			$data['user'] = $user;
	        $data['account'] = $this->admin->account($id_user)->result();
 
			$this->load->view('class/profilemember/v_profilemember',$data);
		}
	}
}