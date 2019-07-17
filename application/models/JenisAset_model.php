<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisAset_model extends CI_Model {

	private $_table = "jenis_aset";
	public $id;
	public $nama;
	public $satuan;
	public $parent_;
	public $jumlah;
	$this->load->model('aset_model');
	$this->load->model('atribut_model');

	public function tambah_JenisAset_rules($value='')
	{
		# code...
		return [
			['field'=>'nama',
			'label'=>'nama',
			'rules'=>'required'],

			['field'=>'satuan',
			'label'=>'satuan',
			'rules'=>'required'],

			['field'=>'parent_',
			'label'=>'parent_',
			'rules'=>'required'],
		];
	}


	//mengembalikan jenis_aset query dalam bentuk array
	//Membutuhkan parameter id (unik)
	public function getById($id)
	{
		# code...
		$result = $this->db->get_where($this->_table,array('id' => $id))->row_array();
		$result['jumlah'] = $this->aset_model->getJumlahByJenis($result['id']);
		return $result;
	}

	public function getAtributById($id)
	{
		# code...
		$query = $this->atribut_model->getByJenis($id);
		return $query->result_array();
	}

	public function getAll()
	{
		# code...
		$result = array();
		$query =$this->db->query("SELECT id FROM jenis_aset");
		foreach ($query->result_array() as $row) {
			# code...
			$new_row = $this->getById($row['id']);
			array_push($result, $new_row);
		}
		return $result;
	}

	public function add($nama,$satuan,$parent)
	{
		$this->nama = $nama;
		$this->satuan = $satuan;
		$this->parent_ = $parent;
		return $this->db->insert($this->_table,$this);
		# code...
	}

	public function edit($id,$nama,$satuan,$parent)
	{
		# code...
		$data = array(
       	'nama' => $nama,
        'satuan' => $email,
    	'parent_' => $parent
		);
		return $this->db->update($this->_table,$data,array('id'=>$id));
	}

	public function delete($id)
	{
		# code...
		return $this->db->delete($this->_table,array('id'=>$id));
	}

}

/* End of file JenisAset_model.php */
/* Location: ./application/models/JenisAset_model.php */