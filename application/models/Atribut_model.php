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
		$query = $this->db->query("SELECT atribut.id AS id, atribut.nama_atribut AS 'Nama Atribut', atribut.Tipe AS Tipe, atribut.keterangan AS Keterangan, atribut.jenis_id AS jenis_id, jenis_aset.nama AS Jenis FROM atribut INNER JOIN jenis_aset ON atribut.jenis_id=jenis_aset.id");
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
		if($this->db->insert($this->_table,$this)){
			$atributid = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
			$asetid = $this->db->query("SELECT id FROM asets WHERE jenis_id=".$jenis_id)->result_array();
			if(count($asetid)>0){
				$query = "INSERT INTO atribut_aset(aset_id,atributtetap_id) VALUES ";
				$index = 1;
				foreach ($asetid as $aid) {
					if($index==1){
						$query = $query."(".$aid['id'].",".$atributid.")";
					}
					else{
						$query = $query.",(".$aid['id'].",".$atributid.")";
					}
					$index = $index +1;
				}
				if($this->db->query($query)){
					return TRUE;
				}
				else{
					return FALSE;
				}
			}
 		}
 		else{
 			return FALSE;
 		}
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
		if($this->db->delete("atribut_aset",array('atributtetap_id'=>$id))){
			if($this->db->delete($this->_table,array('id'=>$id))){
				return TRUE;
			}
			return FALSE;
		}
		return FALSE;
	}
}

/* End of file Atribut_model.php */
/* Location: ./application/models/Atribut_model.php */