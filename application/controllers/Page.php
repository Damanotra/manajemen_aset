<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
	}
	public function sudah_login()
	{	
		var_dump($_SESSION);
		exit();
		$this->load->library('session');
		$data["user"] = $this->User_model->getById($username);
		var_dump($username);
		exit();
		$this->load->view('dashboard', $data);
	}
	
}