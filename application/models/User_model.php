<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
            $this->load->database();
    }

//Listing
public function listing() {
	$this->db->select('users.*, site.nama_site');
	$this->db->from('users');
	//Relasi dengan tabel Site
	$this->db->join('site','site.id_site = users.id_site','LEFT');
	$this->db->order_by('id_users','DESC');
	$query = $this->db->get(); 
	return $query->result();	
}
 
//Detail 
public function detail($id_users) {
	$query = $this->db->get_where('users',array('id_users'=> $id_users));
	return $query->row();
}

    //Tambah
	public function tambah ($data) {
		$this->db->insert('users', $data);
	}


	//Edit
	public function edit($data) {
		$this->db->where('id_users', $data ['id_users']);
		$this->db->update('users', $data);
	}


	//Delete
	public function delete($data) {
		$this->db->where('id_users', $data ['id_users']);
		$this->db->delete('users ', $data);
	}
}