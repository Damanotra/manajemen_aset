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

		$data["pengguna"] = $this->User_model->getById($username);
		$data["user"] = $_SESSION["username"];
		$records = $this->aset_model->getall();
		$columns = array_keys($records[0]);
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard', $data);
	}

	public function showJenisAsetById($id)
	{
		# code...
		$this->load->model('jenisaset_model');
		$records = $this->jenisaset_model->getById($id);
		$columns = array_keys($records[0]);
		//var_dump($records);
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard.php',$data);
	}

	



}	