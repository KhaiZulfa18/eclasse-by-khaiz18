<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model{

	//Input Data Member
	function input_member($input){
		$this->db->insert('tbl_user',$input);
	}

	// Update Member
	function update_member($where,$update){
		$this->db->where($where);
		$this->db->update('tbl_user', $update);
	}

	// Update Password
	function update_password($where,$update){
		$this->db->where($where);
		$this->db->update('tbl_user', $update);
	}

	// Update Photo
	function update_photo($where,$update){
		$this->db->where($where);
		$this->db->update('tbl_user', $update);
	}

	// Update Level
	function update_level($where,$update){
		$this->db->where($where);
		$this->db->update('tbl_user', $update);
	}

	function add_account($input){
		$this->db->insert('tbl_account',$input);
	}

	function account($id_user){
		$this->db->where('id_user',$id_user);
		return $this->db->get('tbl_account');
	}

	function delete_member($where){
		$this->db->where($where);
		$this->db->delete('tbl_user');
	}

	function delete_account($where){
		$this->db->where($where);
		$this->db->delete('tbl_account');
	}

	function check_email($where){
		$this->db->where('email',$where);
		return $this->db->get('tbl_user');
	}

	function check_user($id_user){
		$this->db->where('id_user',$id_user);
		return $this->db->get('tbl_user');
	}

	//Get Data Cond
	function get_data_cond($where,$like,$orderby,$ordertype,$offset,$jml,$table){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
		}
		$this->db->order_by($orderby, $ordertype);
		$this->db->limit($jml, $offset);
		return $this->db->get($table);
	}

	// Get Paging Cond
	function get_paging_cond($where,$like,$table){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
		}
		return $this->db->get($table);
	}

	function get_class_info(){
		$this->db->where('status','profile');
		return $this->db->get('tbl_info');
	}

	function get_total_member(){
		$this->db->where('status',1);
		return $this->db->get('tbl_user');
	}

	// Update profile class
	function update_profile_class($update){
		$this->db->where('status','profile');
		$this->db->update('tbl_info', $update);
	}

	// Update Photo
	function update_logo($update){
		$this->db->where('status','profile');
		$this->db->update('tbl_info', $update);
	}

	function get_profile_class(){
		$this->db->where('status','profile');
		return $this->db->get('tbl_info')->row();
	}
}