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

 	public function getByFormAndAset($form_id,$aset_id)
 	{
 		# code...
 		$row = $this->db->query("SELECT form_row.id AS id, asets.Nama as 'Nama Aset', form_row.tanggal AS Tanggal, form_row.petugas AS Petugas  FROM form_row INNER JOIN asets ON form_row.aset_id = asets.id WHERE form_row.form_id=".$form_id." AND form_row.aset_id=".$aset_id)->row_array();
		
		$temp = $this->db->query("SELECT tindakan.pemeriksaan as Pemeriksaan, kondisi.nilai AS Nilai FROM tindakan INNER JOIN kondisi ON kondisi.tindakan_id=tindakan.id WHERE kondisi.formrow_id=".$row['id'])->result_array();
		foreach ($temp as $t) {
			# code...
			$row[$t['Pemeriksaan']] = $t['Nilai'];
		}
		return $row;
 	}

 	public function getByForm($form_id)
 	{
 		# code...
 		return $this->db->query("SELECT id, tanggal AS Tanggal, form_id, aset_id, petugas AS Petugas FROM form_row WHERE form_id=".$form_id)->result_array();
 	}

 	public function getByFormAset($form_id,$aset_id)
 	{
 		# code...
 		return $this->db->get_where($this->_table,array('form_id' => $form_id,'aset_id'=>$aset_id))->result_array();
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