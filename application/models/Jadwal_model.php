<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

	private $_table = "jadwal";
	public $id;
	public $waktu;
	public $jenis_id;
	public $jenis_perawatan;

	public function JadwalRules()
	{
		# code...
		return [
			['field'=>'waktu',
			'label'=>'waktu',
			'rules'=>'required'],

			['field'=>'jenis_id',
			'label'=>'jenis_id',
			'rules'=>'required'],

			['field'=>'jenis_perawatan',
			'label'=>'jenis_perawatan',
			'rules'=>'required'],

		];
	}

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
		$query = $this->db->query('SELECT id, jenis_id AS Jenis, minggu AS Minggu, bulan AS Bulan, tahun AS Tahun, jenis_perawatan AS Perawatan FROM jadwal');
		return $query->result_array();
	}

	#tested
	public function getById($id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('id' => $id));
		return $query->row_array();
	}

	#tested
	// public function getByBulanTahun($bulan,$tahun)
	// {
	// 	# code...
	// 	$clue = "|".$bulan."|".$tahun;
	// 	$this->db->like('waktu',$clue);
	// 	$query = $this->db->get($this->_table);
	// 	return $query->result_array();
	// }

	#tested
	// public function getByTahun($tahun)
	// {
	// 	# code...
	// 	$clue = "|".$tahun;
	// 	$this->db->like('waktu',$clue);
	// 	$query = $this->db->get($this->_table);
	// 	return $query->result_array();
	// }

	// #tested
	// public function getByJenisTahun($jenis_id,$tahun)
	// {
	// 	# code...
	// 	$clue = "|".$tahun;
	// 	$this->db->like('waktu',$clue);
	// 	$query = $this->db->get_where($this->_table,array('jenis_id' => $jenis_id));
	// 	return $query->result_array();
	// }
	
	
	public function delete($id)
	{
		# code...
		return $this->db->delete($this->_table,array('id'=>$id));
	}
	
	public function add($waktu, $jenis_id,$jenis_perawatan)
	{
		# code...
		$this->waktu = $waktu;
		$this->jenis_id = $jenis_id;
		$this->jenis_perawatan = $jenis_perawatan;
		return $this->db->insert($this->_table,$this);
	}

	public function edit($id,$waktu, $jenis_id,$jenis_perawatan)
	{
		# code...
		$data = array(
       	'waktu' => $waktu,
        'jenis_id' => $jenis_id,
    	'jenis_perawatan' => $jenis_perawatan
		);
		return $this->db->update($this->_table,$data,array('id'=>$id));
	}
}

/* End of file Jadwal_model.php */
/* Location: ./application/models/Jadwal_model.php */