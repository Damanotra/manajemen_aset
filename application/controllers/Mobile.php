<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model('aset_model');
		$this->load->model('jenisaset_model');
		$this->load->model('formRow_model');
		$this->load->model('kondisi_model');
	}

	public function index()
	{
		# code...
		var_dump('mobile');
	}

	public function getAsetById($id)
	{
		# code...
		$result = $this->aset_model->getById($id);
		echo json_encode($result);
	}

	public function getAsetByJenis($jenis_id)
	{
		# code...
		$result = $this->aset_model->getByJenis($jenis_id);
		echo json_encode($result);
	}

	public function getAllAset()
	{
		# code...
		$result = $this->aset_model->getall();
		echo json_encode($result);
	}

	public function getJenisById($id)
	{
		# code...
		$result = $this->jenisaset_model->getById($id);
		echo json_encode($result);
	}

	public function getAllJenis()
	{
		# code...
		$result = $this->jenisaset_model->getall();
		echo json_encode($result);
	}

	public function getFormByJenis($jenis_id)
	{
		# code...
		$result = $this->jadwalform_model->getByJenis($jenis_id);
		echo json_encode($result);
	}

	public function login($username,$password)
	{
		# code...
		$password = md5($password);
		$user = $this->User_model->getById($username);

		if(empty($user)){
			echo json_encode("No username found");
		}else{
			if($password == $user['password']){
				$session = array(
					'authenticated'=>true,
					'username' => $user["username"],
					'nama' => $user["nama"],
					'email' =>$user["email"]
				);
				
				//$this->session->set_userdata($session);
				echo json_encode("verified");
			}else {
				echo json_encode("Wrong Password");
			}
		}
	}

	public function formById($id)
	{
		# code...
		$records = $this->formRow_model->getByForm($id);
		foreach ($records as &$rec) {
			# code...
			$rec['aset'] = $this->db->query('SELECT merk FROM asets WHERE id = '.$rec['aset_id'])->result_array()[0]['merk'];
			$rec['kondisi'] = $this->db->query('SELECT id,atribut_id,nilai FROM kondisi WHERE formrow_id='.$rec['id'])->result_array();
		}
		$columns = array_keys($records[0]);
		$data['table'] = 'formrow';
		$data['records'] = $records;
		$data['columns'] = $columns;
	}

	public function getFormRowByForm($form_id)
	{
		# code...
		$records = $this->formRow_model->getByForm($form_id);
	}
	public function getFormRowByFormAset($form_id,$aset_id)
	{
		# code...
		$records = $this->formRow_model->getByFormAset($form_id,$aset_id);
		echo json_encode($records);
	}
	public function getConditionAsset($formrow_id)
	{
		# code...
		$records = $this->db->query('SELECT id,atribut_id,nilai FROM kondisi WHERE formrow_id='.$formrow_id)->result_array();
		foreach ($records as &$rec) {
			# code...
		$rec['atribut_id']=$this->db->query('SELECT atribut FROM atribut where id ='.$rec['atribut_id'])->result_array()[0]['atribut'];
		}
		echo json_encode($records);
	}
}



/* End of file Mobile.php */
/* Location: ./application/controllers/Mobile.php */