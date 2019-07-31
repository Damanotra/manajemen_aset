<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisi_model extends CI_Model {

	private $_table = "kondisi";
	public $id;
	public $formrow_id;
	public $atribut_id;
	public $nilai;

	public function getByFormRow($formrow_id)
	{
		# code...
		$this->db->get_where($this->_table,array('formrow_id' => $formrow_id));
	}

	public function editNilai($id,$nilai)
	{
		# code...
		$data = array(
       	'nilai' => $nilai
		);
		return $this->db->update($this->_table,$data,array('id'=>$id));
	}

	public function deleteByFormRow($formrow_id)
	{
		# code...
		return $this->db->delete($this->_table,array('formrow_id'=>$formrow_id));
	}


}

/* End of file Kondisi_model.php */
/* Location: ./application/models/Kondisi_model.php */