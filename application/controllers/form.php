<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model('aset_model');
		$this->load->model('jenisaset_model');
		$this->load->model('formRow_model');
		$this->load->model('kondisi_model');
		$this->load->model('Form_model');
	}

	public function index(){
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		redirect('form/formAset/1');
	}

	public function testAjax()
	{
		# code...
		echo json_encode($_POST);
	}

	public function test()
	{
		# code...
		$res =  $this->formRow_model->editUser(1,"q");
		var_dump($res);
		exit();
	}

	public function editKondisi()
	{
		# code...
		$pemeriksaan = $_POST['pemeriksaan'];
		$nilai = $_POST['nilai'];
		$row_id = $_POST['row_id'];
		if ($this->kondisi_model->editNilai($pemeriksaan,$nilai,$row_id)) {
			echo json_encode("success");
		}
	}

	public function getByJadwal($jadwal_id)
	{
		# code...
		$id = $this->db->query("SELECT id FROM form WHERE jadwal_id =".$jadwal_id)->row_array()['id'];
		if ($id!=NULL) {
			redirect('form/formAset/'.$id,'refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Form tidak ditemukan');
			redirect('dashboard/showJadwalAll','refresh');
		}
	}

	public function formAset($id)
	{
		$records = $this->formRow_model->getByForm($id);
		foreach ($records as &$rec) {
			$rec  = $this->formRow_model->getByFormAndAset($id,$rec['aset_id']);
		}
		$columns = array_keys($records[0]);
		$data['table'] = 'formrow';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('formAset.php',$data);
	}

	public function showAtributAll()
	{
		# code...
		if($this->session->userdata('authenticated')==false){
			redirect('login');
			 
		}
		# code...
		$records = $this->tindakan_model->getAll();
		$columns = array_keys($records[0]);
		$data['table'] = 'atribut';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('form1.php',$data);
	}
	public function insert()
 	{
  		$data = array(
   		'merk' => $this->input->post('merk'),
   		'kapasitas'  => $this->input->post('kapasitas'),
   		'lokasi'   => $this->input->post('lokasi'));
  	}

}