<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model('aset_model');
		$this->load->model('jenisaset_model');
		$this->load->model('jadwalform_model');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		redirect('dashboard/showAsetAll');
	}
	public function showAsetByJenis($jenis_id)
	{
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		# code...
		$records = $this->aset_model->getByJenis($jenis_id);
		$columns = array_keys($records[0]);
		$data['table'] = 'aset';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard', $data);
	}

	public function showAsetAll()
	{
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		# code...
		$records = $this->aset_model->getall();
		$columns = array_keys($records[0]);
		$data['table'] = 'aset';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard', $data);
	}

	public function showAsetById($id)
	{
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		# code...
		$records = $this->aset_model->getById($id);
		$columns = array_keys($records[0]);
		$data['table'] = 'aset';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard', $data);
	}

	public function showJenisAsetById($id)
	{
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		# code...
		$records = $this->jenisaset_model->getById($id);
		$columns = array_keys($records[0]);
		$data['table'] = 'jenis aset';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard.php',$data);
	}

	public function showJenisAll()
	{
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		# code...
		$records = $this->jenisaset_model->getAll();
		$columns = array_keys($records[0]);
		$data['table'] = 'jenis aset';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard.php',$data);
	}

	public function showJadwalByJenis($id)
	{
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		# code...
		$records = $this->jadwalform_model->getByJenisTahun($id,2019);
		$columns = array_keys($records[0]);
		$data['table'] = 'jadwal';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard.php',$data);
	}

	public function addAset()
	{
		# code...
		$aset = $this->aset_model;

		$validation = $this->form_validation;
		$validation->set_rules($aset->rules());
		if($validation->run()){
			$get = $this->input->get();
			$merk = $get['merk'];
			$kapasitas = $get['kapasitas'];
			$lokasi = $get['lokasi'];
			$jenis_id = $get['jenis_id'];
 			$aset->add($merk,$kapasitas,$lokasi,$jenis_id);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		$this->load->view('add');
	}



}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */