<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model('aset_model');
	}
	public function index(){
		redirect('login');
	}

	public function sudah_login($username)
	{
		redirect('dashboard');
	}

	public function home()
	{
		$this->load->view('home.php');
	}
	



}	