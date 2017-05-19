<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	// Load database
        public function __construct()
        {
                parent::__construct();
                $this->load->model('site_model');
        }

	// Index 
	public function index () {
		$site = $this->site_model->listing();


		$data =	array( 'title' => 'Data Site',
						'site' => $site,
						'isi' => 'admin/site/list');

		$this->load->view ('admin/layout/wrapper', $data);

		}

		// Tambah Site
	public function tambah () {

		//Validasi
		$valid= $this->form_validation;
		$valid->set_rules('nama_site', 'Nama site', 'required',
				array ('required'	=> 'Nama Site Harus Di isi'));

			if($valid->run()===FALSE) {
				//End Validasi

		$data =	array( 'title' => 'Tambah Site',
						'isi' => 'admin/site/tambah');
		$this->load->view ('admin/layout/wrapper', $data);
		//Masuk Database
			}else{
				$i = $this->input;
				$data= array (		'id_user'			=>1,
									'nama_site'			=> $i->post('nama_site'),
									'contact_person'	=> $i->post('contact_person'),
									'alamat'			=> $i->post('alamat'),
									'telepon'			=> $i->post('telepon'),
									'hp'				=> $i->post('hp'),
									'email'				=> $i->post('email'),
									'kota'				=> $i->post('kota'),
									'keterangan'		=> $i->post('keterangan'),
								);
				$this->site_model->tambah($data);
				$this->session->set_flashdata ('sukses', 'Data site telah di Tambah');
				redirect (base_url('admin/site'));
			}
				//End Masuk Database 


		}
		//Delete
		public function delete($id_site) {	
			$data= array('id_site' => $id_site);
			$this->site_model->delete($data);
				$this->session->set_flashdata ('sukses', 'Data site telah di Hapus ');
				redirect (base_url('admin/site'));

		}

		//Edit
	public function edit ($id_site) {
		
		//Validasi
		$valid= $this->form_validation;
		$valid->set_rules('id_site', 'Nama site', 'required',
				array ('required'	=> 'Nama Site Harus Di isi'));

			if($valid->run()===FALSE) {
				//End Validasi

		$data =	array( 'title' => 'Edit Site',
						'isi' => 'admin/site/edit');
		$this->load->view ('admin/layout/wrapper', $data);
		//Masuk Database
			}else{
				$i = $this->input;
				$data= array (		'id_site'			=> $id_site,
									'id_user'			=>1,
									'nama_site'			=> $i->post('nama_site'),
									'contact_person'	=> $i->post('contact_person'),
									'alamat'			=> $i->post('alamat'),
									'telepon'			=> $i->post('telepon'),
									'hp'				=> $i->post('hp'),
									'email'				=> $i->post('email'),
									'kota'				=> $i->post('kota'),
									'keterangan'		=> $i->post('keterangan'),
								);
				$this->site_model->edit($data);
				$this->session->set_flashdata ('sukses', 'Data site telah di Tambah');
				redirect (base_url('admin/edit'));
			}
		}
	}