<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Model{

	// Cek data administrator di database
	function check_user($username){
		$this->db->where('username', $username);
		return $this->db->get('tbl_user');
	}

	function login($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('tbl_user');
	}

	function login_check($username,$password,$table){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get($table);
	}

}