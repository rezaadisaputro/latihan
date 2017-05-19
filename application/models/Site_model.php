		<?php defined('BASEPATH') OR exit('No direct script access allowed');

		class Site_model extends CI_Model {

		        public function __construct() {
		                $this->load->database();
		        }

		        //Listing 
		        public function listing() {
		        	$query= $this->db->get('site');
		        	return $query->result ();
		        }

		        //Detail 
		        public function detail($id_site) {
		        	$query= $this->db->get_where('site', array('id_site' => $id_site));
		        	return $query->row ();
		        }


		        //Tambah
		        public function tambah ($data) {
		        	$this->db->insert('site', $data);
		        }


		        //Edit
		        public function edit($data) {
		        	$this->db->where('id_site', $data ['id_site']);
		        	$this->db->update('site', $data);
		        }


		        //Delete
		        public function delete($data) {
		        	$this->db->where('id_site', $data ['id_site']);
		        	$this->db->delete('site', $data);
		        }
		}