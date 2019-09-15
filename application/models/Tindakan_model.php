<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan_model extends CI_Model {

	private $_table = "tindakan";
	private $id;
	public $pemeriksaan;
	public $jenis_id;
	public $deskripsi;

	#tested
	public function getByJenis($jenis_id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('jenis_id' => $jenis_id));
		return $query->result_array();
	}

	public function getAll()
	{
		# code...
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}


	public function add($pemeriksaan,$jenis_id,$deskripsi=null)
	{
		# code...
		$this->pemeriksaan = $pemeriksaan;
		$this->jenis_id = $jenis_id;
		$this->deskripsi = $deskripsi;
		return $this->db->insert($this->_table,$this);
	}

	#tested
	public function getById($id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('id' => $id));
		return $query->row_array();
	}

	#tested
	public function edit($id,$atribut,$jenis_id,$deskripsi=null)
	{
		# code...
		$data = array(
       	'pemeriksaan' => $pemeriksaan,
        'jenis_id' => $jenis_id,
    	'deskripsi' => $deskripsi
		);
		return $this->db->update($this->_table,$data,array('id'=>$id));
	}

	#tested
	public function delete($id)
	{
		# code...
		return $this->db->delete($this->_table,array('id'=>$id));
	}

}

/* End of file Tindakan_model.php */
/* Location: ./application/models/Tindakan_model.php */