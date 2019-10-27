<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan_model extends CI_Model {

	private $_table = "tindakan";
	private $id;
	public $pemeriksaan;
	public $jenis_id;
	public $deskripsi;

	public function rules()
	{
		# code...
		return [
			['field'=>'pemeriksaan',
			'label'=>'pemeriksaan',
			'rules'=>'required'],

			['field'=>'jenis_id',
			'label'=>'jenis_id',
			'rules'=>'required']
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
		$query = $this->db->query("SELECT tindakan.id AS id, tindakan.pemeriksaan AS Pemeriksaan, tindakan.jenis_id AS jenis_id, jenis_aset.nama AS Jenis, tindakan.deskripsi AS Deskripsi FROM tindakan INNER JOIN jenis_aset ON tindakan.jenis_id=jenis_aset.id");
		return $query->result_array();
	}




	public function add($pemeriksaan,$jenis_id,$deskripsi=null)
	{
		# code...
		$this->pemeriksaan = $pemeriksaan;
		$this->jenis_id = $jenis_id;
		$this->deskripsi = $deskripsi;
		if($this->db->insert($this->_table,$this)){
			$tindakan_id = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
			// $row_id = $this->db->query("SELECT form_row.id AS id FROM row_id INNER JOIN asets WHERE asets.jenis_id=".$jenis_id)->result_array();
			if($this->db->query("INSERT INTO kondisi(formrow_id) SELECT form_row.id AS id FROM form_row INNER JOIN asets WHERE asets.jenis_id=".$jenis_id)){
				return $this->db->query("UPDATE kondisi SET tindakan_id=".$tindakan_id." WHERE tindakan_id IS NULL");
			}
			return FALSE;
		}
		return FALSE;
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