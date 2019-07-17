<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

	private $_table = "jadwal_perawatan";
	public $id;
	public $waktu;
	public $jenis_id;
	public $jenis_perawatan;

	public function getByJenis($jenis_id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('jenis_id' => $jenis_id));
		return $query->result_array();
	}

	public function getById($id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('id' => $id));
		return $query->row_array();
	}
	public function getByBulan($bulan)
	{
		# code...
		$clue = "|".$bulan."|";
		$this->db->like('waktu',$clue);
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}

	public function delete($id)
	{
		# code...
		return $this->db->delete($this->_table,array('id'=>$id));
	}

}

/* End of file Jadwal_model.php */
/* Location: ./application/models/Jadwal_model.php */