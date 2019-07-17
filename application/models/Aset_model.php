<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_model extends CI_Model {

	private $_table = "asets";
	public $id;
	public $merk;
	public $kapasitas;
	public $lokasi;
	public $jenis_id;

	#tested
 	public function getById($id)
	{
		# code...
		$query = $this->db->get_where($this->_table,array('id' => $id));
		return $query->row_array();
	}

	#tested
	public function getAll()
	{
		# code...
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}

	#tested
	public function getJumlahByJenis($jenis_id)
	{
		# code...
		$query = $this->db->get_where($this->_table,array('jenis_id' => $jenis_id));
		return $query->num_rows();
	}

	#
	public function getByJenis($jenis_id)
	{
		# code...
		$query = $this->db->get_where($this->_table,array('jenis_id' => $jenis_id));
		return $query->result_array();
	}

	public function add($merk,$kapasitas,$lokasi,$jenis_id)
	{
		# code...
		$this->merk = $merk;
		$this->kapasitas = $kapasitas;
		$this->lokasi = $lokasi;
		$this->jenis_id = $jenis_id;
		return $this->db->insert($this->_table,$this);
	}

	public function edit($id,$merk,$kapasitas,$lokasi,$jenis_id)
	{
		# code...
		$data = array(
       	'merk' => $merk,
        'kapasitas' => $kapasitas,
    	'lokasi' => $lokasi,
    	'jenis_id' => $jenis_id
		);
		return $this->db->update($this->_table,$data,array('id'=>$id));
	}

	public function delete($id)
	{
		# code...
		return $this->db->delete($this->_table,array('id'=>$id));
	}

}

/* End of file Aset_model.php */
/* Location: ./application/models/Aset_model.php */