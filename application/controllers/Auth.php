<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		
		$this->load->model('authentication');
		$this->load->model('admin');
		$this->load->helper('cookie');		          
		$this->load->helper('string');		          
		$this->load->helper('text');	
		$this->load->helper('user_helper');	
		$this->profile = $this->admin->get_profile_class();          
	}

	public function index(){
		$data['headertitle'] = 'Login';
		$data['profile_class'] = $this->profile;

		$this->load->view('auth/v_login',$data);
	}

	public function login_act(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$check = $this->authentication->check_user($username)->row();

		$password_user = $check->password;

		if (password_verify($password, $password_user)) {			
			// if($check->num_rows() == 1){

				$cookie = array(
					'name'   => 'cookie_login',
					'value'  => $username,                            
                        //'expire' => 3600, //30D
                        'expire' => 1209600 //2 week
                        //'secure' => TRUE
                    );
				set_cookie($cookie);

				$checkrows = $check;

				$data_session = array(
					'id' => $checkrows->id,
					'id_user' => $checkrows->id_user,
					'name' => $checkrows->name,
					'gender' => $checkrows->gender, 
					'profil_pic' => $checkrows->profil_picture, 
					'level' => $checkrows->level, 
					'status' => "login"
				);

				$this->session->set_userdata($data_session);

				redirect('home/index');
			// }
		}
		else{
			$this->session->set_flashdata('error','Username atau Password Salah!');

			redirect('auth');
		}
	}

	//Logout
	public function logout(){
		$this->session->sess_destroy();
		delete_cookie('cookie_login');

		redirect('auth');
	}

	public function register(){
		$data['headertitle'] = 'Register';
		$data['profile_class'] = $this->profile;

		$this->load->view('auth/v_register',$data);
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
			Berhasil Daftar, silahkan Login!
			</div>
			</div>';
			$response['status'] = "sukses";
		}
		echo json_encode($response);
	}
}