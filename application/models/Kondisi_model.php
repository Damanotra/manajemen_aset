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

	public function editNilai($pemeriksaan,$nilai,$row_id)
	{
		# code...
		$data = array(
       	'nilai' => $nilai
		);
		$id = $this->db->query("SELECT kondisi.id AS id FROM kondisi INNER JOIN tindakan ON kondisi.tindakan_id=tindakan.id WHERE kondisi.formrow_id=".$row_id." AND tindakan.pemeriksaan='".$pemeriksaan."'")->row_array()['id'];
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