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
		$this->load->model('formRow_model');
		$this->load->model('kondisi_model');
	}

	public function index(){
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		redirect('form/formAset');
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

	public function ajaxKondisi()
	{
		# code...
		$id = $_POST['id'];
		$nilai = $_POST['nilai'];
		$row_id = $_POST['row_id'];
		$username = $_SESSION['username'];

		if ($this->kondisi_model->editNilai($id,$nilai)) {
			# code...
			if ($this->formRow_model->editUser($row_id,$username)) {
				# code...
				echo "success";
			}
			
		}

	}

	public function formAset()
	{
		# code...
		$records = $this->formRow_model->getByForm(1);
		foreach ($records as &$rec) {
			# code...
			$rec['aset'] = $this->db->query('SELECT merk FROM asets WHERE id = '.$rec['aset_id'])->result_array()[0]['merk'];
			$rec['kondisi'] = $this->db->query('SELECT id,atribut_id,nilai FROM kondisi WHERE formrow_id='.$rec['id'])->result_array();
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
		$records = $this->Atribut_model->getAll();
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