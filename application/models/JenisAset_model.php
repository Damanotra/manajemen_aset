<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisAset_model extends CI_Model {

	private $_table = "jenis_aset";
	public $id;
	public $nama;
	public $satuan;
	public $parent;
	//public $jumlah;
	
	

	public function tambah_JenisAset_rules()
	{
		# code...
		return [
			['field'=>'nama',
			'label'=>'nama',
			'rules'=>'required'],

			['field'=>'satuan',
			'label'=>'satuan',
			'rules'=>'required'],

			['field'=>'parent',
			'label'=>'parent'],
		];
	}


	//mengembalikan jenis_aset query dalam bentuk array
	//Membutuhkan parameter id (unik)
	#tested
	public function getById($id)
	{
		# code...
		$this->load->model('aset_model');
		$result = $this->db->query("SELECT id, nama AS 'Nama Jenis', satuan AS Satuan, parent AS 'Kelompok Jenis' FROM jenis_aset WHERE id=".$id)->result_array();
		$result[0]['Jumlah'] = $this->aset_model->getJumlahByJenis($result[0]['id']);
		return $result;
	}

	public function getAllParent()
	{
		# code...
		$query = $this->db->query("SELECT id, nama AS 'Nama Jenis' FROM jenis_aset WHERE parent IS NULL");
		return $query->result_array();
	}

	#tested
	public function getAtributById($id)
	{
		# code...
		$this->load->model('tindakan_model');
		$query = $this->tindakan_model->getByJenis($id);
		return $query->result_array();
	}

	#tested
	public function getAll()
	{
		# code...
		$query = $this->db->query("SELECT id,nama AS 'Nama Jenis', satuan AS Satuan, parent as Kelompok FROM jenis_aset ORDER BY Kelompok IS NULL DESC, Kelompok ASC");
		return $query->result_array();
	}

	#tested
	public function add($nama,$satuan,$parent=null)
	{
		$this->nama = $nama;
		$this->satuan = $satuan;
		$this->parent = $parent;
		return $this->db->insert($this->_table,$this);
		# code...
	}

	public function edit($id,$nama,$satuan,$parent=null)
	{
		# code...
		$data = array(
       	'nama' => $nama,
        'satuan' => $satuan,
    	'parent' => $parent
		);
		return $this->db->update($this->_table,$data,array('id'=>$id));
	}

	public function delete($id)
	{
		# code...
		$list_hapus = $this->db->query("SELECT asets.id FROM asets WHERE asets.jenis_id=".$id)->result_array();
		if (count($list_hapus)>0) {
			# code...
			foreach ($list_hapus as $lh) {
				$this->aset_model->delete($lh);
			}
		}
		$query1 = $this->db->query("DELETE FROM atribut WHERE jenis_id =".$id);
		if($query1){
			$query2 = $this->db->query("DELETE FROM form WHERE form.jadwal_id=(SELECT id FROM jadwal WHERE jadwal.jenis_id=".$id.")");
			if($query2){
				$query3 = $this->db->query("DELETE FROM jadwal WHERE jenis_id=".$id);
				if ($query3) {
					return TRUE;
				}
			}
		}
	}
}

/* End of file JenisAset_model.php */
/* Location: ./application/models/JenisAset_model.php */