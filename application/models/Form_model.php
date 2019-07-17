<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {
	private $_table = "form";
	public $id;
	public $jenis_id;
	public $jadwal_id;
	public $pembuat;
	public $penyetuju;


	$this->load->model('jadwal_model');
	public function getById($id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('id' => $id));
		return $query->row_array();
	}

	public function getByJadwal($jadwal_id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('jadwal_id' => $jadwal_id));
		return $query->row_array();
	}

	public function getByJenisTahun($jenis_id,$tahun)
	{
		# code...
		$clue = "'%|".$tahun."'";
		$query = $this->db->query("SELECT form.id AS id,jadwal_perawatan.jenis_id AS jenis_id,form.jadwal_id AS jadwal_id, form.pembuat AS pembuat, form.penyetuju AS penyetuju FROM form INNER JOIN jadwal_perawatan ON form.jadwal_id=jadwal_perawatan.id WHERE jadwal_perawatan.jenis_id=".$jenis_id." AND jadwal_perawatan.waktu like ".$clue);
		return $query->result_array();
	}
	public function getByTahun($tahun)
	{
		# code...
		$query = $this->db->query("SELECT * FROM form WHERE YEAR(tanggal)=".$tahun);
		return $query->result_array();
	}
	public function addByJadwal($jadwal_id)
	{
		# code...
		$this->jadwal_id = $jadwal_id;
		return $this->db->insert($this->_table,$this);
	}
}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */