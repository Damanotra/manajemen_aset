<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormRow_model extends CI_Model {

	private $_table = "form_row";
	public $id;
	public $tanggal;
	public $form_id;
	public $aset_id;
 	public $petugas;

 	public function create($tanggal,$form_id,$aset_id)
 	{
 		# code...
 		$this->tanggal = $tanggal;
		$this->form_id = $form_id;
		$this->aset_id = $aset_id;
		$this->petugas = NULL;
		return $this->db->insert($this->_table,$this);
 	}

 	public function getByForm($form_id)
 	{
 		# code...
 		return $this->db->get_where($this->_table,array('form_id' => $form_id))->result_array();
 	}

 	public function deleteByForm($form_id)
 	{
 		# code...
 		return $this->db->delete($this->_table,array('form_id'=>$form_id));
 	}

 	public function delete($id)
 	{
 		# code...
 		$this->load->model('Kondisi_model');
 		if($this->kondisi_model->deleteByFormRow($id)){
 			return $this->db->delete($this->_table,array('form_id'=>$form_id));
 		}
 	}

 	public function editUser($id,$username)
 	{
 		# code...
		$data = array(
       	'petugas' => $username,
       	'tanggal' => date('Y-m-d')
		);
		return $this->db->update($this->_table,$data,array('id'=>$id));
 	}

}

/* End of file FormRow_model.php */
/* Location: ./application/models/FormRow_model.php */