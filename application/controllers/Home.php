<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	var $profile;
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id_user')){
			redirect('auth');
		}
		else {
			$this->load->model('admin');
			$this->load->model('tweets');
			$this->load->model('note');
			$this->load->helper('text');             
			$this->load->helper('string');
			$this->load->helper('user_helper');       
			
	        $this->profile = $this->admin->get_profile_class();                      
		}
	}

	public function index()
	{
		$data['headertitle'] = "Home - Eclasse";
		$data['main_menu'] = "home";
		$data['menu'] = "";
		$data['profile_class'] = $this->profile;

		$id_user = $this->session->userdata('id_user');
	    $data['tweet_count'] = $this->tweets->tweet_count($id_user)->num_rows();
	    $data['member_count'] = $this->admin->member_count();
	  	$data['pinned_notes'] = $this->note->get_pinned_notes()->result();
	  	  
		$this->load->view('home/v_home', $data);
	}

	public function add_member(){
		if ($this->session->userdata('level')>1) {
			$data['headertitle'] = "Add Member";
			$data['main_menu'] = "member";
			$data['menu'] = "add_member";
			$data['profile_class'] = $this->profile;

			$this->load->view('dashboard/v_inputmember',$data);
		}else{
			$data['headertitle'] = "Forbidden Page";

			$this->load->view('error403',$data);
		}
	}

	public function insert_member(){
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$gender = $this->input->post('gender');
		$loc_of_birth = $this->input->post('loc_of_birth');
		$date_of_birth = $this->input->post('date_of_birth');
		$bio = $this->input->post('bio');
		$address = $this->input->post('address');

		$rndm = random_string('numeric',7);
		$id_user = "RPL3-".$rndm;

		$password_hash = password_hash($password, PASSWORD_DEFAULT);

		//Check Email
		$test_email = $this->admin->check_email($email)->num_rows();

		if ($test_email>0) {
			$response['status'] = 'gagal';

			$response['pesan'] =  '<div class="alert alert-warning alert-dismissible text-left show fade">
			<div class="alert-body">
			<button class="close" data-dismiss="alert">
			<span>&times;</span>
			</button>
			Oops, Email telah digunakan!
			</div>
			</div>';
		}
		else{
			if(!empty($_FILES['picture']['name'])){

				$config['upload_path']   = './images/profil_picture/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 4000;
				$newname = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);
				$newname = str_replace(',', '_', $newname);
				$newname = str_replace('.', '_', $newname);
				$newname = str_replace('"', '_', $newname);
				$newname = str_replace("'", "_", $newname);
				$newname = str_replace(' ', '_', $newname);
				$config['file_name'] = $newname;

				if (!is_dir($config['upload_path'])) {
					mkdir($config['upload_path'], 0777, TRUE);
				}

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('picture')){
					$response['pesan'] =  '<div class="alert alert-warning alert-dismissible text-left show fade">
					<div class="alert-body">
					<button class="close" data-dismiss="alert">
					<span>&times;</span>
					</button>
					Oops, Gagal Upload Foto!'.$this->upload->display_errors().'
					</div>
					</div>';
					$response['status'] = "gagal";
					echo json_encode($response);
					exit();
				}
				else{
					$upload_data = $this->upload->data();
					$picture_name = $upload_data['file_name'];
				}
			}else{
				$picture_name= 'no-photo.png';
			}

			$input['id_user'] = $id_user;
			$input['username'] = $username;
			$input['password'] = $password_hash;
			$input['name'] = $name;
			$input['email'] = $email;
			$input['phone'] = $phone;
			$input['gender'] = $gender;
			$input['loc_of_birth'] = $loc_of_birth;
			$input['date_of_birth'] = $date_of_birth;
			$input['bio'] = $bio;
			$input['address'] = $address;
			$input['profil_picture'] = $picture_name;
			$input['status'] = 1;
			$input['level'] = 1;

			$this->admin->input_member($input);
			$response['pesan'] = '<div class="alert alert-success alert-dismissible text-left show fade">
			<div class="alert-body">
			<button class="close" data-dismiss="alert">
			<span>&times;</span>
			</button>
			Yey, Berhasil menyimpan data!
			</div>
			</div>';
			$response['status'] = "sukses";
		}
		echo json_encode($response);
	}

	public function list_member(){
		$data['headertitle'] = "List Member";
		$data['main_menu'] = "member";
		$data['menu'] = "list_member";
		$data['profile_class'] = $this->profile;

		$this->load->view('dashboard/listmember/v_listmember',$data);
	}

	public function get_member(){
		$gender = $this->input->post('gender');
		$status = $this->input->post('status');
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

		if (empty($gender&&$status)) {
			$where['status'] = 1;
		}else{
			$where = array(
				'status' => $status,
				'gender' => $gender
			);
		}

		if (!empty($search)) {
			$like['name'] = $search;
		}
		else {
			$like = NULL;
		}
		$data['list_member'] = $this->admin->get_data_cond($where,$like,'name','ASC',$offset,$dataPerPage,'tbl_user')->result();

		$data['noPage'] = $noPage;
		$data['offset'] = $offset;

		$this->load->view('dashboard/listmember/table_member', $data);
	}

	public function paging_member(){
		$gender = $this->input->post('gender');
		$status = $this->input->post('status');
		$search = $this->input->post('search');
		$page = $this->input->post('page');

		$dataPerPage = 10;
		if(empty($page)) {
			$noPage = 1;
		}
		else {
			$noPage = $page;
		}

		if (empty($gender&&$status)) {
			$where['status'] = 1;
		}else{
			$where = array(
				'status' => $status,
				'gender' => $gender
			);
		}
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

		$this->load->view('dashboard/listmember/paging_member', $data);
	}

	public function update_level(){
		$id_user = $this->input->post('id_user');
		$level = $this->input->post('level');

		$user = $this->session->userdata('level');

		if ($level>$user) {
			$response['status'] = 'gagal';
			$response['pesan'] = '<div class="alert alert-danger alert-dismissible text-left show fade">
			<div class="alert-body">
			<button class="close" data-dismiss="alert">
			<span>&times;</span>
			</button>
			Anda tidak memiliki akses!
			</div>
			</div>';
		}else{
			$update['level'] = $level; 

			$where['id_user'] = $id_user;
			$this->admin->update_level($where,$update);

			$response['status'] = 'sukses';
			$response['pesan'] = '<div class="alert alert-success alert-dismissible text-left show fade">
			<div class="alert-body">
			<button class="close" data-dismiss="alert">
			<span>&times;</span>
			</button>
			Anda tidak memiliki akses!
			</div>
			</div>';
		}
		echo json_encode($response);
	}

	public function delete_member(){
		$id_user = $this->input->post('id_user');

		$where['id_user'] = $id_user;
		$this->admin->delete_member($where);
	}
}
