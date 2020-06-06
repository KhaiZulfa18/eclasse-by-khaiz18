<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
			$this->load->helper('text');             
			$this->load->helper('string');        
			$this->load->helper('user_helper');     
			$this->profile = $this->admin->get_profile_class();      
		}
	}

	public function index(){
		$id_user = $this->session->userdata('id_user');

		$check = $this->admin->check_user($id_user);
		if (empty($check->num_rows())) {
			redirect('home');
		}else{
			$data['headertitle'] = 'My Profile';
			$data['main_menu'] = '';
			$data['menu'] = '';
			$data['profile_class'] = $this->profile;

			$data['user'] = $check->row();
			$data['account'] = $this->admin->account($id_user)->result();

			$this->load->view('profile/v_myprofile',$data);
		}
	}

	public function setting_profile(){
		$id_user = $this->session->userdata('id_user');

		$check = $this->admin->check_user($id_user);
		if (empty($check->num_rows())) {
			redirect('home');
		}else{
			$data['headertitle'] = 'Setting Profile';
			$data['main_menu'] = '';
			$data['menu'] = '';
			$data['profile_class'] = $this->profile;

			$data['user'] = $check->row();
			$data['account'] = $this->admin->account($id_user)->result();

			$this->load->view('profile/v_settingprofile',$data);
		}
	}

	public function update_profile(){
		$id_user = $this->input->post('id_user');
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$gender = $this->input->post('gender');
		$loc_of_birth = $this->input->post('loc_of_birth');
		$date_of_birth = $this->input->post('date_of_birth');
		$bio = $this->input->post('bio');
		$address = $this->input->post('address');

		$where['id_user'] = $id_user;

		$update = array(
			'name' => $name, 
			'username' => $username, 
			'email' => $email, 
			'phone' => $phone, 
			'gender' => $gender, 
			'loc_of_birth' => $loc_of_birth, 
			'date_of_birth' => $date_of_birth, 
			'bio' => $bio, 
			'address' => $address 
		);

		$this->admin->update_member($where,$update);
	}

	//Update Password
	public function update_password(){

		$id_user = $this->input->post('id_user');
		$currentpassword = $this->input->post('password');
		$newpassword = $this->input->post('newpassword');
		$confirmpassword = $this->input->post('confirmpassword');

		$user = $this->admin->check_user($id_user)->row();
		$password = $user->password;

		if ($newpassword!=$confirmpassword) {
			$response['status'] = 'gagal';
			$response['pesan'] = '<div class="alert alert-warning alert-dismissible text-left show fade">
			<div class="alert-body">
			<button class="close" data-dismiss="alert">
			<span>&times;</span>
			</button>
			Konfirmasi Password Salah!
			</div> 
			</div>';
		}else{
			if ($currentpassword!=$password) {
				$response['status'] = 'gagal';
				$response['pesan'] = '<div class="alert alert-warning alert-dismissible text-left show fade">
				<div class="alert-body">
				<button class="close" data-dismiss="alert">
				<span>&times;</span>
				</button>
				Password Anda Salah!
				</div> 
				</div>';
			}elseif ($newpassword==$password) {
				$response['status'] = 'gagal';
				$response['pesan'] = '<div class="alert alert-warning alert-dismissible text-left show fade">
				<div class="alert-body">
				<button class="close" data-dismiss="alert">
				<span>&times;</span>
				</button>
				Password Tidakk Boleh Sama Dengan Password Sebelumnya!
				</div> 
				</div>';
			}else{
				$where['id_user'] = $id_user;
				$update['password'] = $newpassword;
				$this->admin->update_password($where,$update);

				$response['status'] = 'berhasil';
				$response['pesan'] = '<div class="alert alert-success alert-dismissible text-left show fade">
				<div class="alert-body">
				<button class="close" data-dismiss="alert">
				<span>&times;</span>
				</button>
				Yey, Berhasil Memperbarui Password!
				</div> 
				</div>';
			}
		}
		echo json_encode($response);
	}

	public function update_photo(){

		if(!empty($_FILES['picture']['name'])){

			$config['upload_path']   = './images/profil_picture/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 1500;
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

				$id_user = $this->input->post('id_user');

				$where['id_user'] = $id_user;

				$update['profil_picture'] = $picture_name;

				$this->admin->update_photo($where,$update);
				$response['pesan'] = '<div class="alert alert-success alert-dismissible text-left show fade">
				<div class="alert-body">
				<button class="close" data-dismiss="alert">
				<span>&times;</span>
				</button>
				Yey, Berhasil mengubah photo profile!'.$id_user.'
				</div>
				</div>';
				$response['status'] = "sukses";
			}
		}else{
			$response['pesan'] = '<div class="alert alert-danger alert-dismissible text-left show fade">
				<div class="alert-body">
				<button class="close" data-dismiss="alert">
				<span>&times;</span>
				</button>
				Oops, photo kosong!
				</div>
				</div>';
			// $response['pesan'] = 'tes'.$pic;
			$response['status'] = "gagal";
		}
		echo json_encode($response);
	}

	public function insert_account(){
		
		$id_user = $this->input->post('id_user');
		$name_account = $this->input->post('name_account');
		$type_account = $this->input->post('type_account');
		$link_account = $this->input->post('link_account');

		$input['id_user'] = $id_user;
		$input['name'] = $name_account;
		$input['type'] = $type_account;
		$input['link'] = $link_account;

		$this->admin->add_account($input);
	}

	public function delete_account(){
		
		$id = $this->input->post('id');
		$id_user = $this->session->userdata('id_user');

		$where = array(
			'id_user' => $id_user,
			'id' => $id
		);

		$this->admin->delete_account($where);
	}

}