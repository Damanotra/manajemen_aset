<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atribut_model extends CI_Model {

	private $_table = "atribut";
	private $id;
	public $atribut;
	public $jenis_id;
	public $deskripsi;

	public function getByJenis($jenis_id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('jenis_id' => $jenis_id));
		return $query->result_array();
	}

	public function add($atribut,$jenis_id,$deskripsi)
	{
		# code...
		$this->atribut = $atribut;
		$this->jenis_id = $jenis_id;
		$this->deskripsi = $deskripsi;
		return $this->db->insert($this->_table,$this);
	}
	public function getById($id)
	{
		# code...
		$query =  $this->db->get_where($this->_table,array('id' => $id));
		return $query->row_array();
	}
	public function edit($id,$atribut,$jenis_id,$deskripsi)
	{
		# code...
		$data = array(
       	'atribut' => $atribut,
        'jenis_id' => $jenis_id,
    	'deskripsi' => $deskripsi
		);
		return $this->db->update($this->_table,$data,array('id'=>$id));
	}

	public function delete($id)
	{
		# code...
		return $this->db->delete($this->_table,array('id'=>$id));
	}
}

/* End of file Atribut_model.php */
/* Location: ./application/models/Atribut_model.php */