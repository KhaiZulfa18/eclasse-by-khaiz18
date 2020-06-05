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
			$this->load->model('tweets');
			$this->load->helper('text');             
			$this->load->helper('user_helper');             
			$this->load->helper('string');             
		}
	}

	public function index(){
		$data['headertitle'] = "Tweet";
		$data['main_menu'] = "tweet";
		$data['menu'] = "";

		$this->load->view('tweet/v_tweet', $data);
	}

	public function insert_tweet(){
		$id_user = $this->session->userdata('id_user');

		$tweet_post = $this->input->post('tweet_post');
		$plain_tweet = $this->input->post('plain_tweet');

		$id_tweet = random_string('numeric',16);

		$input['id_user'] = $id_user;
		$input['id_tweet'] = $id_tweet;
		$input['tweet'] = $tweet_post;
		$input['plain_tweet'] = $plain_tweet;
		$input['likes'] = 0;

		$this->tweets->insert_tweet($input);
	}

	public function get_tweet(){
		$search = $this->input->post('search');
		$page = $this->input->post('page');

		$dataPerPage = 20;
		if(empty($page)) {
			$noPage = 1;
		}
		else {
			$noPage = $page;
		}
		$offset = ($noPage - 1) * $dataPerPage;


		if (!empty($search)) {
			$like['tbl_user.name'] = $search;
			$like2['tbl_tweet.tweet'] = $search;
		}
		else {
			$like = NULL;
			$like2 = NULL;
		}
		$where = NULL;
		$data['list_tweet'] = $this->tweets->get_data_cond_two_join_tweet($where,$like,$like2,'tbl_tweet.id','DESC',$offset,$dataPerPage)->result();

		$data['noPage'] = $noPage;
		$data['offset'] = $offset;

		$this->load->view('tweet/tweet_post', $data);
	}

	public function paging_tweet(){
		$search = $this->input->post('search');
		$page = $this->input->post('page');

		$dataPerPage = 20;
		if(empty($page)) {
			$noPage = 1;
		}
		else {
			$noPage = $page;
		}

		if (!empty($search)) {
			$like['tbl_user.name'] = $search;
			$like2['tbl_tweet.tweet'] = $search;
		}
		else {
			$like = NULL;
			$like2 = NULL;
		}
		$where = NULL;
		$jumData = $this->tweets->get_paging_cond_two_join_tweet($where,$like,$like2)->num_rows();
		$data['jumData'] = $jumData;
		$data['jumPage'] = ceil($jumData/$dataPerPage);
		$data['noPage'] = $noPage;

		$this->load->view('tweet/tweet_paging', $data);
	}

	public function delete_tweet(){
		$id_tweet = $this->input->post('id_tweet');
		$id_user = $this->session->userdata('id_user');

		$where = array(
			'id_user' => $id_user,
			'id_tweet' => $id_tweet
		);
		$this->tweets->delete_tweet($where);
	}
}