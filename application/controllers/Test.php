<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//controller for testing model and view
//act as a driver

class Test extends CI_Controller {

	public function index()
	{
		$this->load->model('aset_model');
		$records = $this->aset_model->getall();
		$columns = array_keys($records[0]);
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('kerangka.php',$data);
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
		$this->load->view('kerangka.php',$data);
	}

	public function getJenisNameById($value='')
	{
		# code...
	}

	public function edit($id)
	{
		# code...
		$this->load->view('welcome_message.php');
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */