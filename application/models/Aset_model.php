<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_model extends CI_Model {

	private $_table = "asets";
	public $id;
	public $Nama;
	public $jenis_id;

	public function rules()
	{
		# code...
		return [
			['field'=>'Nama',
			'label'=>'Nama',
			'rules'=>'required'],

			['field'=>'jenis_id',
			'label'=>'jenis_id',
			'rules'=>'required']
		];
	}

	public function load_data()
 	{
 		$this->db->order_by('id', 'DESC');
  		$query = $this->db->get($this->_table);
  		return $query->result_array();
 	}

 	public function getAtributTetap($id)
 	{
 		# code...
 		$query = $this->db->query('SELECT atribut.nama_atribut as atribut, atribut_aset.nilai AS Nilai FROM atribut JOIN atribut_aset WHERE atribut_aset.aset_id='.$id.' AND atribut.id=atribut_aset.atributtetap_id')->result_array();
 	}



	#tested
 	public function getById($id)
	{
		# code...
		$aset = $this->db->query('SELECT id AS id , Nama AS Nama, jenis_id as Jenis FROM asets WHERE id='.$id)->result_array();
		
		$temp = $this->db->query('SELECT atribut.nama_atribut as atribut, atribut_aset.nilai AS Nilai FROM atribut JOIN atribut_aset WHERE atribut_aset.aset_id='.$id.' AND atribut.id=atribut_aset.atributtetap_id')->result_array();
		foreach ($temp as $t) {
			# code...
			$aset[0][$t['atribut']] = $t['Nilai'];
		}
		return $aset;
	}



	public function getAset($id)
	{
		# code...
		$aset = $this->db->query('SELECT id AS id , Nama AS Nama, jenis_id as Jenis FROM asets WHERE id='.$id)->result_array();
		
		$atribut = $this->db->query('SELECT atribut.nama_atribut as atribut, atribut.nama_tanpa_spasi AS variable, atribut_aset.nilai AS Nilai FROM atribut JOIN atribut_aset WHERE atribut_aset.aset_id='.$id.' AND atribut.id=atribut_aset.atributtetap_id')->result_array();
		$data['aset'] = $aset;
		$data['atribut'] = $atribut;
		return $data;
	}

	public function update($nama)
	{
		# code...
		$query = 'INSERT INTO ';
	}

	#tested
	public function getAll()
	{
		# code...
		$query = $this->db->query('SELECT id, Nama AS Nama, jenis_id AS Jenis FROM asets');
		return $query->result_array();
	}

	#tested
	public function getJumlahByJenis($jenis_id)
	{
		# code...
		$query = $this->db->get_where($this->_table,array('jenis_id' => $jenis_id));
		return $query->num_rows();
	}

	#tested
	public function getByJenis($jenis_id)
	{
		# code...
		$query = $this->db->query('SELECT id, Nama AS Nama, jenis_id AS Jenis FROM asets WHERE jenis_id='.$jenis_id);
		return $query->result_array();
	}

	#tested
	public function add($Nama,$jenis_id)
	{
		# code...
		$this->Nama = $Nama;
		$this->jenis_id = $jenis_id;
		$query1 = $this->db->insert($this->_table,$this);
		$aset_id = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
		$atribut_id = $this->db->query('SELECT id as atributtetap_id FROM atribut WHERE jenis_id='.$jenis_id)->result_array();
		if(!is_null($atribut_id[0])){
			$sql = 'INSERT INTO atribut_aset(aset_id,atributtetap_id) VALUES';
			$index = 1;
			foreach ($atribut_id as $atr) {
		 	# code...
				if ($index==1) {
					# code...
					$sql = $sql.' ('.$aset_id.','.$atr['atributtetap_id'].')';
					$index = $index+1;
					continue;
				}
				$sql = $sql.', ('.$aset_id.','.$atr['atributtetap_id'].')';
			} 
		}
		$query2 = $this->db->query($sql);

		return ($query1 AND $query2);
	}

	#tested
	public function edit($id,$Nama,$jenis_id)
	{
		# code...
		$data = array(
       	'Nama' => $Nama,
    	'jenis_id' => $jenis_id
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

/* End of file Aset_model.php */
/* Location: ./application/models/Aset_model.php */