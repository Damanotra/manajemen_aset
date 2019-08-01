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
		$records = $this->jadwalform_model->getByJenis($id,2019);
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

	public function addJadwalAset()
	{
			
		$asetJadwal = $this->jadwalform_model;
		$validation = $this->form_validation;
		$validation->set_rules($asetJadwal->JadwalRules());
		if($validation->run()){
			$post = $this->input->post();
			
			$waktu = $post['waktu'];
			$jenis_id = $post['jenis_id'];
			$jenis_perawatan = $post['jenis_perawatan'];
 			$asetJadwal->add($waktu, $jenis_id,$jenis_perawatan);
			$this->session->set_flashdata('success', 'Berhasil diperbaharui');

		}
		
		$data['jenis'] = $this->jenisaset_model->getall();
		$this->load->view('add_JadwalAset',$data);
	}


	public function editAset(){

		//Masih belum bisa

		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}

		$id = $this->uri->segment(3);
		$result = $this->aset_model->getById($id);
		 if($result->num_rows() > 0){
        $i = $result->row_array();
        $data = array(
            'id'    => $i['id'],
            'merk'  => $i['merk'],
            'kapasitas' => $i['kapasitas'],
            'lokasi' => $i['lokasi']
        );
    	}

		$data['aset'] = $this->aset_model->getall();
		$data['jenis'] = $this->jenisaset_model->getall();
		$this->load->view('editAset.php',$data);
	}
	public function editAsetProses()
	{
		# code...
		$post = $this->input->post();
		$merk = $post["merk"];
		$kapasitas = $post["kapasitas"];
		$lokasi = $post["lokasi"];
		$jenis_id = $post["jenis_id"];
		
       $this->aset_model->edit($id,$merk,$kapasitas,$lokasi,$jenis_id);
       $this->session->set_flashdata('success', 'Berhasil disimpan');
		redirect('dashboard/showAsetAll');
	}
	public function aboutUs()
		{
			# code...
			$this->load->view('aboutUs.php');
		}
	public function hapus()
	{
		# code...
		$id = $this->input->post('id');

		$this->aset_model->delete($id);
		redirect('dashboard');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */