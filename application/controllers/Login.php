<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// index login

	public function index() {

			//Validasi form
			$valid = $this->form_validation;

			$valid->set_rules('username','Username','required',
				array('required' => 'Username harus di isi'));

			$valid->set_rules('password','Password','required',
				array('required' => 'Password harus di isi'));

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if($valid->run()) {
				$this->simple_login->login($username,$password, 
					base_url('admin/dasbor'), base_url('login'	)); 
			}

			$data= array('title' => 'Login Administrator');
			$this->load->view('admin/login_view', $data);
	}

	//logout disini ya
	public function logout() {
		$this->simple_login->logout();
	}
}