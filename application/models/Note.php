<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Model{

	//Input Data Member
	function input_note($input){
		$this->db->insert('tbl_note',$input);
	}

	function delete_note($where){
		$this->db->where($where);
		$this->db->delete('tbl_note');
	}

	// Update Password
	function pinned_note($id_note,$update){
		$this->db->where('id_note',$id_note);
		$this->db->update('tbl_note', $update);
	}

	function get_pinned_notes(){
		$this->db->select('tbl_note.*, tbl_user.id as iduser, tbl_user.name as name, tbl_user.created_at as user_create, tbl_user.status as sts, tbl_user.id_user as user, tbl_user.profil_picture as profil_pic'); 
		$this->db->from('tbl_note');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_note.id_user');

		$this->db->where('tbl_note.status',2);

		return $this->db->get();
	}

	//Ambil data
	function get_data_cond_two_join_note($where,$like,$like2,$orderby,$ordertype,$offset,$jml){
		$this->db->select('tbl_note.*, tbl_user.id as iduser, tbl_user.name as name, tbl_user.created_at as user_create, tbl_user.status as sts, tbl_user.id_user as user, tbl_user.profil_picture as profil_pic'); 
		$this->db->from('tbl_note');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_note.id_user');
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
			$this->db->or_like($like2);
		}
		$this->db->order_by($orderby, $ordertype);
		$this->db->limit($jml, $offset);
		return $this->db->get();
	}

	// Ambil data paging
	function get_paging_cond_two_join_note($where,$like,$like2){
		$this->db->select('tbl_note.*, tbl_user.id as iduser, tbl_user.name as name, tbl_user.created_at as user_create, tbl_user.status as sts, tbl_user.id_user as user, tbl_user.profil_picture as profil_pic'); 
		$this->db->from('tbl_note');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_note.id_user');
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($like)) {
			$this->db->like($like);
			$this->db->or_like($like2);
		}
		return $this->db->get();
	}
}
