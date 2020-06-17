<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tweets extends CI_Model{

	//Input Data Tweet
	function insert_tweet($input){
		$this->db->insert('tbl_tweet',$input);
	}

	// Delete Tweet
	function delete_tweet($where){
		$this->db->where($where);
		$this->db->delete('tbl_tweet');
	}

	function tweet_count($id_user){
		$this->db->where('id_user',$id_user);
		return $this->db->get('tbl_tweet');
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

	//Ambil data
	function get_data_cond_two_join_tweet($where,$like,$like2,$orderby,$ordertype,$offset,$jml){
		$this->db->select('tbl_tweet.*, tbl_user.id as iduser, tbl_user.name as name, tbl_user.created_at as user_create, tbl_user.profil_picture as profil_pic, tbl_user.id_user as user'); 
		$this->db->from('tbl_tweet');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_tweet.id_user');
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
	function get_paging_cond_two_join_tweet($where,$like,$like2){
		$this->db->select('tbl_tweet.*, tbl_user.id as iduser, tbl_user.name as name, tbl_user.created_at as user_create, tbl_user.profil_picture as profil_pic, tbl_user.id_user as user'); 
		$this->db->from('tbl_tweet');
		$this->db->join('tbl_user', 'tbl_user.id_user = tbl_tweet.id_user');
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