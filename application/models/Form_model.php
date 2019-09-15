<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {
	private $_table = "form_per_jadwal";
	public $id;
	public $waktu;
	public $jenis_id;
	public $jenis_perawatan;
 	public $pembuat_form;
	public $penyetuju_form;

	
	public function getAll()
	{
		# code...
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}

	#tested
	public function getById($id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('id' => $id));
		return $query->row_array();
	}

	public function delete($value='')
	{
		# code...
	}

	

}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */