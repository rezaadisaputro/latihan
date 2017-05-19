<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


// Load database
        public function __construct()
        {
                parent::__construct();
                $this->load->model('site_model'); //Data Site
                $this->load->model('user_model'); //Data User
        }

	// Index 
	public function index () {
		$user 	= $this->user_model->listing();
		$data =	array( 'title' => 'Administrator',
						'user' => $user,
						'isi' => 'admin/user/list');

		$this->load->view ('admin/layout/wrapper', $data);

		}

		//Tambah
		public function tambah () {
		$site 	= $this->site_model->listing();

		//Validasi
		$valid= $this->form_validation;
		$valid->set_rules('nama', 'Nama', 'required',
		array('required' => 'Nama harus di isi'));

	
		$valid->set_rules('username', 'Username', 'required|is_unique[users.username]',
		array('required' 	=> 'Username harus di isi',
				'is_unique' => 'Ooopss... Username : <strong>'.
								$this->input->post('username').
								'</strong> sudah digunakan. Buat username baru!'));

		
		$valid->set_rules('email', 'Email', 'required|valid_email',
		array('required' 	  => 'Email harus di isi',
				'valid_email' => 'Ooops... email tidak valid'));

		

	
		$valid->set_rules('password', 'Password', 'required|max_length[30]|min_length[6]',
		array('required' => 'Password harus di isi',
				'min_length' => 'Password minimal 6 karakter',
				'max_length' => 'password maksimal 30 karakter'));

		if ($valid->run()===FALSE) {

			//End Validasi
		$data =	array( 'title' => 'Tambah  Administrator',
						'site' => $site,
						'isi' => 'admin/user/tambah');

		$this->load->view ('admin/layout/wrapper', $data);
		//Masuk Database
		}else {
			$i = $this->input;
			$data = array ( 'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')), //enkripsi
							'id_site'			=> $i->post('id_site'),
							'akses_level'		=> $i->post('akses_level'),
							);
			$this->user_model->tambah($data);
			$this->session->set_flashdata ('sukses', 'User/Adminitrator berhasil di tambahkan' );
			redirect (base_url('admin/user')); 
	}
		//End masuk database


		}

		//Edit
		public function edit ($id_users) {
		$site 	= $this->site_model->listing();
		$user   = $this->user_model->detail($id_users);
		//Validasi
		$valid= $this->form_validation;
		$valid->set_rules('nama', 'Nama', 'required',
		array('required' => 'Nama harus di isi'));

		/*
		$valid->set_rules('username', 'Username', 'required|is_unique[users.username]',
		array('required' 	=> 'Username harus di isi',
				'is_unique' => 'Ooopss... Username : <strong>'.
								$this->input->post('username').
								'</strong> sudah digunakan. Buat username baru!'));

		*/
		$valid->set_rules('email', 'Email', 'required|valid_email',
		array('required' 	  => 'Email harus di isi',
				'valid_email' => 'Ooops... email tidak valid'));

		
		$valid->set_rules('password', 'Password', 'required|max_length[30]|min_length[6]',
			array('required' => 'Password harus di isi',
				'min_length' => 'Password minimal 6 karakter',
				'max_length' => 'password maksimal 30 karakter'));

		if ($valid->run()===FALSE) {

			//End Validasi
		$data =	array( 'title' => 'Edit Administrator',
						'site' => $site,
						'user' => $user,
						'isi' => 'admin/user/edit');

		$this->load->view ('admin/layout/wrapper', $data);
		//Masuk Database
		}else {
			$i = $this->input;
			//kalau password kurang dari 6 dan lebih dari 32
			if(strlen($i->post('password')) < 6 || strlen($i->post('password')) > 32) {
			$data = array ( 'id_users'			=> $id_users,
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							//'password'			=> sha1($i->post('password')), //enkripsi sha1
							'id_site'			=> $i->post('id_site'),
							'akses_level'		=> $i->post('akses_level'),
							);
		}else{
				$data = array ( 'id_users'			=> $id_users,
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')), //enkripsi sha1
							'id_site'			=> $i->post('id_site'),
							'akses_level'		=> $i->post('akses_level'),
							);
		}
			$this->user_model->edit($data);
			$this->session->set_flashdata ('sukses', 'User/Adminitrator berhasil di edit' );
			redirect (base_url('admin/user')); 
	}
		//End masuk database


		}
			//Delete
		public function delete($id_users) {	
			$data= array('id_users' => $id_users);
			$this->user_model->delete($data);
				$this->session->set_flashdata ('sukses', 'Data user telah di Hapus ');
				redirect (base_url('admin/user'));

		}
	}