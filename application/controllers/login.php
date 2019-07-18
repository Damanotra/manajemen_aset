<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		if($this->session->userdata('authenticated'))
			redirect('page/sudah_login');

		$this->load->view("login_page");

	}	

	public function login_proccess()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$user = $this->User_model->getById($username);

		if(empty($user)){
			$this->session->set_flashdata('message','Username tidak ditemukan');
			redirect('login');
		}else{
			if($password == $user['password']){
				$session = array(
					'authenticated'=>true,
					'username' => $user->username,
					'nama' => $user->nama,
					'email' =>$user->email
				);
				$this->session->set_userdata($session);
				/*echo ($session["username"]);
				exit();*/
				var_dump($session);
			exit();
				redirect('page/sudah_login/');
			}else {
				$this->session->set('message', 'Password salah');
				redirect('login');
			}
		}
	}

	public function daftar(){
		
		$user = $this->User_model;
		$validation = $this->form_validation;
		$validation->set_rules($user->signup_rules());

		if($validation->run())
		{
			$post = $this->input->post();
			$username = $post["username"];
			$nama = $post["nama"];
			$email = $post["email"];
			$password = md5($post["password"]);

			$user->add($username,$nama,$email,$password);
			$this->session->set_flashdata('success','Berhasil daftar');
			redirect('login');
		}else{
			$this->load->view('register');
		}
	}
	

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}
