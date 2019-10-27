<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

	private $_table = "jadwal";
	public $id;
	public $minggu;
	public $bulan;
	public $tahun;
	public $jenis_id;
	public $jenis_perawatan;

	public function JadwalRules()
	{
		return [
			['field'=>'minggu',
			'label'=>'minggu',
			'rules'=>'required'],

			['field'=>'bulan',
			'label'=>'bulan',
			'rules'=>'required'],			

			['field'=>'tahun',
			'label'=>'tahun',
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
		$query = $this->db->query('SELECT id, jenis_id AS Jenis, minggu AS Minggu, bulan AS Bulan, tahun AS Tahun, jenis_perawatan AS Perawatan FROM jadwal WHERE jenis_id='.$jenis_id);
		return $query->result_array();
	}

	public function getAll()
	{
		# code...
		$query = $this->db->query('SELECT jadwal.id AS id, jadwal.jenis_id AS jenis_id, jenis_aset.nama AS Jenis, jadwal.minggu AS Minggu, jadwal.bulan AS Bulan, jadwal.tahun AS Tahun, jadwal.jenis_perawatan AS Perawatan FROM jadwal INNER JOIN jenis_aset ON jadwal.jenis_id = jenis_aset.id');
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
		if ($this->db->query("DELETE FROM kondisi WHERE formrow_id= ANY (SELECT id from form_row WHERE form_id=(SELECT id FROM form WHERE jadwal_id=".$id."))")) {
			if ($this->db->query("DELETE FROM form_row WHERE form_id=(SELECT id FROM form WHERE jadwal_id=".$id.")")) {
				if($this->db->query("DELETE FROM form WHERE jadwal_id=".$id)){
					if ($this->db->query("DELETE FROM jadwal WHERE id=".$id)) {
						return TRUE;
					} else {
						return FALSE;
					}
				}
				else{
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
	}
	
	public function add($minggu,$bulan,$tahun,$jenis_id,$jenis_perawatan)
	{
		$this->minggu = $minggu;
		$this->bulan  = $bulan;
		$this->tahun  = $tahun;
		$this->jenis_id = $jenis_id;
		$this->jenis_perawatan = $jenis_perawatan;
		if($this->db->insert($this->_table,$this)){
			$jadwal_id = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
			if($this->db->query("INSERT INTO form(jadwal_id) VALUES (".$jadwal_id.")")){
				$form_id = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
				$aset_id = $this->db->query("SELECT id FROM asets WHERE jenis_id=".$jenis_id)->result_array();
				foreach ($aset_id as $aset) {
					if ($this->db->query("INSERT INTO form_row(aset_id,form_id) VALUES (".$aset['id'].",".$form_id.")")) {
						$row_id = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
						$tindakan_id = $this->db->query("SELECT id AS tindakan_id FROM tindakan WHERE jenis_id=".$jenis_id)->result_array();
						if (count($tindakan_id)>0){
							$sql_ = "INSERT INTO kondisi(formrow_id,tindakan_id) VALUES ";
							$index_ = 1;
							foreach ($tindakan_id as $tindakan) {
								if ($index_==1) {
									$sql_ = $sql_.' ('.$row_id.','.$tindakan['tindakan_id'].')';
									$index_ = $index_+1;
									continue;
								}
								$sql_ = $sql_.', ('.$row_id.','.$tindakan['tindakan_id'].')';
							}
							if ($this->db->query($sql_)) {
								continue;
							} else {
								return FALSE;
							}
						}
					} else {
						return FALSE;
					}
				}
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
		return TRUE;
	}



	public function edit($id,$minggu,$bulan,$tahun, $jenis_id,$jenis_perawatan)
	{
		$data = array(
       	'minggu' => $minggu,
       	'bulan' => $bulan,
       	'tahun' => $tahun,
        'jenis_id' => $jenis_id,
    	'jenis_perawatan' => $jenis_perawatan
		);
		return $this->db->update($this->_table,$data,array('id'=>$id));
	}
}

/* End of file Jadwal_model.php */
/* Location: ./application/models/Jadwal_model.php */