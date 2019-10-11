<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atribut_model extends CI_Model {

	private $_table = "atribut";
	private $id;
	public $nama_atribut;
	public $nama_tanpa_spasi;
	public $tipe;
	public $keterangan;
	public $jenis_id;

	public function rules()
	{
		# code...
		return [
			['field'=>'nama_atribut',
			'label'=>'nama_atribut',
			'rules'=>'required'],

			['field'=>'nama_tanpa_spasi',
			'label'=>'nama_tanpa_spasi',
			'rules'=>'required'],

			['field'=>'tipe',
			'label'=>'tipe',
			'rules'=>'required']
		];
	}


	#tested
	public function getByJenis($jenis_id)
	{
		# code...
		$query =  $this->db->query("SELECT id, nama_atribut AS 'Nama Atribut', Tipe, keterangan AS Keterangan, jenis_id AS Jenis FROM atribut WHERE jenis_id=".$jenis_id);
		return $query->result_array();
	}

	public function getAll()
	{
		# code...
		$query = $this->db->query("SELECT id, nama_atribut AS 'Nama Atribut', Tipe, keterangan AS Keterangan, jenis_id AS Jenis FROM atribut");
		return $query->result_array();
	}


	public function add($nama_atribut,$nama_tanpa_spasi,$tipe,$keterangan=NULL,$jenis_id)
	{
		# code...
		$this->nama_atribut = $nama_atribut;
		$this->nama_tanpa_spasi = $nama_tanpa_spasi;
		$this->tipe = $tipe;
		$this->keterangan = $keterangan;
		$this->jenis_id = $jenis_id;
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
	public function edit($id,$nama_atribut,$nama_tanpa_spasi,$tipe=1,$keterangan=NULL,$jenis_id)
	{
		# code...
		$data = array(
       	'nama_atribut' => $nama_atribut,
        'nama_tanpa_spasi' => $nama_tanpa_spasi,
    	'tipe' => $tipe,
    	'keterangan' => $keterangan,
    	'jenis_id' => $jenis_id,
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

/* End of file Atribut_model.php */
/* Location: ./application/models/Atribut_model.php */