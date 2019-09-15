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
		if($this->session->userdata('authenticated')){
			/*var_dump('nama');
			exit();*/
			
			redirect('page/home/'.$_SESSION['username']);
		}

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
					'username' => $user["username"],
					'nama' => $user["nama"],
					'email' =>$user["email"]
				);
				
				$this->session->set_userdata($session);
				redirect('login');

			}else {
				$this->session->set_flashdata('message', 'Password salah');
				redirect('login');
			}
		}
	}

	public function loginMobile($username,$password)
	{
		# code...
		$password = md5($password);
		$user = $this->User_model->getById($username);

		if(empty($user)){
			echo json_encode("No username found");
		}else{
			if($password == $user['password']){
				$session = array(
					'authenticated'=>true,
					'username' => $user["username"],
					'nama' => $user["nama"],
					'email' =>$user["email"]
				);
				
				$this->session->set_userdata($session);
				echo json_encode("verified");
			}else {
				echo json_encode("Wrong Password");
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
		}		
		else
			{
				$this->load->view('register');
			}
	}
	

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}


	public function edit(){
		$data["user"] = $_SESSION["username"];

		 $this->load->view('edit_akun',$data);
		}

	public function proses_edit()
	{
		$username = $_SESSION["username"];
		$post = $this->input->post();
		$nama = $post["nama"];
		$email = $post["email"];
		$password = md5($post["password"]);
       if( $this->User_model->edit($username,$nama,$email,$password))
       {
       	$_SESSION["nama"] = $nama;
       	$_SESSION["email"] = $email;
       	$_SESSION["password"] = $password;
       	$this->session->set_flashdata('pesan','Berhasil mengganti');
       }

        redirect('dashboard');
	}
	

}
