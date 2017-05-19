<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_berita extends CI_Controller {

	// Load database
        public function __construct()
        {
                parent::__construct();
                $this->load->model('kategori_berita_model');
        }

	// Index 
	public function index () {
		$kategori_berita = $this->kategori_berita_model->listing();

			//validasi
			$valid= $this->form_validation;
			$valid->set_rules('nama_kategori_berita','Nama kategori berita',
							'required|is_unique[kategori_berita.nama_kategori_berita]',
							array( 'required' => 'Kategori Berita harus diisi',
									'is_unique' => 'Oops.. Kategori Berita : <strong>'.
													$this->input->post('nama_kategori_berita').
													'</strong> sudah ada. Buat Kategori baru'));
			if ($valid->run () === FALSE)	{
				//END Validasi
			

		$data =	array( 'title'				 	=> 'Data Kategori Berita',
						'kategori_berita' 		=> $kategori_berita,
						'isi' 					=> 'admin/kategori_berita/list');
		$this->load->view ('admin/layout/wrapper', $data);
		//Masuk Database
	}else{
		$i = $this->input;
				$data= array (		'nama_kategori_berita'				=> $i->post('nama_kategori_berita'),
									'keterangan'						=> $i->post('keterangan'),
									'urutan'							=> $i->post('urutan'),	
								);

				$this->kategori_berita_model->tambah ($data);
				$this->session->set_flashdata ('sukses', 'Data berita telah di Tambah');
				redirect (base_url('admin/kategori_berita'));
	}
		//End Masuk Database 
		}

		//edit
		public function edit($id_kategori_berita) {

		}

		//Delete
		public function delete($id_kategori_berita) {	
			$data= array('id_kategori_berita' => $id_kategori_berita);
			$this->kategori_berita_model->delete($data);
				$this->session->set_flashdata ('sukses', 'Data kategori_berita telah di Hapus ');
				redirect (base_url('admin/kategori_berita'));

		}
		}