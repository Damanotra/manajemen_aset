<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model('aset_model');
		$this->load->model('jenisaset_model');
		$this->load->model('jadwalform_model');
	}

	public function index(){

		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		redirect('login');
	}
	public function formAset()
		{
			# code...
			$this->load->view('formAset.php');
		}

	public function showAtributAll()
	{
		# code...
		if($this->session->userdata('authenticated')==false){
			redirect('login');
			 
		}
		# code...
		$records = $this->Atribut_model->getAll();
		$columns = array_keys($records[0]);
		$data['table'] = 'atribut';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('form1.php',$data);
	}
}