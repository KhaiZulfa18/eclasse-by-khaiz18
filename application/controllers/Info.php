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
	var $profile;
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('id_user')){
			redirect('auth');
		}
		else {
			$this->load->model('admin');
			$this->load->model('note');
			$this->load->helper('text');             
			$this->load->helper('user_helper');             
			$this->load->helper('string');     
			$this->profile = $this->admin->get_profile_class();      

		}
	}

	public function index(){
		$data['headertitle'] = "Profile Class";
		$data['main_menu'] = "info";
		$data['menu'] = "";
		$data['class'] = $this->admin->get_class_info()->row();
		$data['members'] = $this->admin->get_total_member()->num_rows();
		$data['profile_class'] = $this->profile;

		$this->load->view('info/v_info', $data);
	}

	public function settings(){
		if ($this->session->userdata('level')>1) {
			$data['headertitle'] = "Setting Info";
			$data['main_menu'] = "settings";
			$data['menu'] = "";
			$data['class'] = $this->admin->get_class_info()->row();
			$data['profile_class'] = $this->profile;

			$this->load->view('info/v_settinginfo', $data);
		}else{
			$data['headertitle'] = "Forbidden Page";

			$this->load->view('error403',$data);
		}
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

	public function update_logo(){

		if(!empty($_FILES['picture']['name'])){

			$config['upload_path']   = './images/class_logo/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2000;
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

			if (!$this->upload->do_upload('picture')){
				$response['pesan'] =  '<div class="alert alert-warning alert-dismissible text-left show fade">
				<div class="alert-body">
				<button class="close" data-dismiss="alert">
				<span>&times;</span>
				</button>
				Oops, Gagal Upload Logo!'.$this->upload->display_errors().'
				</div>
				</div>';
				$response['status'] = "gagal";
				echo json_encode($response);
				exit();
			}
			else{
				$upload_data = $this->upload->data();
				$picture_name = $upload_data['file_name'];

				$update['logo'] = $picture_name;

				$this->admin->update_logo($update);
				$response['pesan'] = '<div class="alert alert-success alert-dismissible text-left show fade">
				<div class="alert-body">
				<button class="close" data-dismiss="alert">
				<span>&times;</span>
				</button>
				Yey, Berhasil mengubah Logo!
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
			Oops, Logo kosong!
			</div>
			</div>';
			$response['status'] = "gagal";
		}
		echo json_encode($response);
	}

	public function delete_logo(){
		
		$update['logo'] = NULL;

		$empty = $this->admin->update_logo($update);
		if (!$empty) {
			$response['pesan'] = '<div class="alert alert-success alert-dismissible text-left show fade">
			<div class="alert-body">
			<button class="close" data-dismiss="alert">
			<span>&times;</span>
			</button>
			Logo Dikosongkan!
			</div>
			</div>';
			$response['status'] = "sukses";
		}else{
			$response['pesan'] = '<div class="alert alert-danger alert-dismissible text-left show fade">
			<div class="alert-body">
			<button class="close" data-dismiss="alert">
			<span>&times;</span>
			</button>
			Gagal!
			</div>
			</div>';
			$response['status'] = "gagal";
		}
		echo json_encode($response);
	}

	//notes
	public function notes(){
		$data['headertitle'] = 'Note';
		$data['main_menu'] = 'info';
		$data['menu'] = 'notes';
		$data['profile_class'] = $this->profile;
		$data['pinned_notes'] = $this->note->get_pinned_notes()->result();
		
		$this->load->view('notes/v_notes',$data);
	}

	public function get_notes(){
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


		if (!empty($search)) {
			$like['tbl_user.name'] = $search;
			$like2['tbl_note.plain_note'] = $search;
		}
		else {
			$like = NULL;
			$like2 = NULL;
		}
		$where = NULL;
		$data['list_notes'] = $this->note->get_data_cond_two_join_note($where,$like,$like2,'tbl_note.status','DESC',$offset,$dataPerPage)->result();

		$data['noPage'] = $noPage;
		$data['offset'] = $offset;

		$data['search'] = $search;

		$this->load->view('notes/notes', $data);
	}

	public function paging_notes(){
		$search = $this->input->post('search');
		$page = $this->input->post('page');

		$dataPerPage = 10;
		if(empty($page)) {
			$noPage = 1;
		}
		else {
			$noPage = $page;
		}

		if (!empty($search)) {
			$like['tbl_user.name'] = $search;
			$like2['tbl_note.plain_note'] = $search;
		}
		else {
			$like = NULL;
			$like2 = NULL;
		}
		$where = NULL;
		$jumData = $this->note->get_paging_cond_two_join_note($where,$like,$like2)->num_rows();
		$data['jumData'] = $jumData;
		$data['jumPage'] = ceil($jumData/$dataPerPage);
		$data['noPage'] = $noPage;

		$this->load->view('notes/paging_notes', $data);
	}

	public function add_notes(){
		if ($this->session->userdata('level')>1) {
			$data['headertitle'] = 'Add Notes';
			$data['main_menu'] = 'info';
			$data['menu'] = 'notes';
			$data['profile_class'] = $this->profile;
			
			$this->load->view('notes/v_inputnotes',$data);
		}else{
			$data['headertitle'] = "Forbidden Page";

			$this->load->view('error403',$data);
		}
	}

	public function insert_note(){
		$note = $this->input->post('note');
		$plain_note = $this->input->post('plain_note');
		$status = $this->input->post('status');

		$id_notes = random_string('numeric',6);
		$id_user = $this->session->userdata('id_user');

		$input['id_note'] = $id_notes;
		$input['id_user'] = $id_user;
		$input['note'] = $note;
		$input['plain_note'] = $plain_note;
		$input['status'] = $status;

		$this->note->input_note($input);
	}

	public function delete_note(){
		$id_note = $this->input->post('id_note');

		$where['id_note'] = $id_note;

		$this->note->delete_note($where);
	}

	public function pinned_note(){
		$id_note = $this->input->post('id_note');
		
		$update['status'] = 2;

		$this->note->pinned_note($id_note,$update);		
	}

	public function unpinned_note(){
		$id_note = $this->input->post('id_note');
		
		$update['status'] = 1;

		$this->note->pinned_note($id_note,$update);		
	}
}