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
		$aset = $this->aset_model;
		$validation = $this->form_validation;
		$validation->set_rules($aset->rules());
		if($validation->run()){
			$post = $this->input->post();
			$merk = $post['merk'];
			$kapasitas = $post['kapasitas'];
			$lokasi = $post['lokasi'];
			$jenis_id = $post['jenis_id'];
 			$aset->add($merk,$kapasitas,$lokasi,$jenis_id);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		$data['jenis'] = $this->jenisaset_model->getall();
		$this->load->view('add_aset',$data);
	}

	public function addJenisAset()
	{
		# code...
		$aset = $this->aset_model;
		$validation = $this->form_validation;
		$validation->set_rules($aset->rules());
		if($validation->run()){
			$post = $this->input->post();
			$merk = $post['nama'];
			$kapasitas = $post['satuan'];
			$lokasi = $post['parent'];
 			$aset->add($nama,$satuan,$parent,$jenis_id);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		$data['jenis'] = $this->jenisaset_model->getall();
		$this->load->view('add_aset',$data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */