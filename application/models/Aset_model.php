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
		$aset = $this->db->query('SELECT asets.id AS id , asets.Nama AS Nama, asets.jenis_id as jenis_id, jenis_aset.nama AS Jenis FROM asets INNER JOIN jenis_aset ON asets.jenis_id=jenis_aset.id WHERE asets.id='.$id)->result_array();
		
		$temp = $this->db->query('SELECT atribut.nama_atribut as atribut, atribut_aset.nilai AS Nilai FROM atribut JOIN atribut_aset WHERE atribut_aset.aset_id='.$id.' AND atribut.id=atribut_aset.atributtetap_id')->result_array();
		foreach ($temp as $t) {
			# code...
			$aset[0][$t['atribut']] = $t['Nilai'];
		}
		return $aset;
	}



	public function getAset($id)
	{
		$aset = $this->db->query('SELECT asets.id AS id , asets.Nama AS Nama, asets.jenis_id as jenis_id, jenis_aset.nama AS Jenis FROM asets INNER JOIN jenis_aset ON asets.jenis_id=jenis_aset.id WHERE asets.id='.$id)->result_array();
		
		$atribut = $this->db->query('SELECT atribut.nama_atribut as atribut, atribut.nama_tanpa_spasi AS variable, atribut_aset.nilai AS Nilai FROM atribut JOIN atribut_aset WHERE atribut_aset.aset_id='.$id.' AND atribut.id=atribut_aset.atributtetap_id')->result_array();
		$data['aset'] = $aset;
		$data['atribut'] = $atribut;
		return $data;
	}

	public function update($nama)
	{
		$query = 'INSERT INTO ';
	}

	#tested
	public function getAll()
	{
		# code...
		$query = $this->db->query('SELECT asets.id, asets.Nama AS Nama, asets.jenis_id AS jenis_id, jenis_aset.nama AS Jenis FROM asets INNER JOIN jenis_aset ON asets.jenis_id=jenis_aset.id');
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
		$query = $this->db->query('SELECT asets.id AS id , asets.Nama AS Nama, asets.jenis_id as jenis_id, jenis_aset.nama AS Jenis FROM asets INNER JOIN jenis_aset ON asets.jenis_id=jenis_aset.id WHERE jenis_id='.$jenis_id);
		return $query->result_array();
	}

	#tested
	public function add($Nama,$jenis_id)
	{
		# code...
		$this->Nama = $Nama;
		$this->jenis_id = $jenis_id;
		if ($this->db->insert($this->_table,$this)) {
			# code...
			$aset_id = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
			$atribut_id = $this->db->query('SELECT id as atributtetap_id FROM atribut WHERE jenis_id='.$jenis_id)->result_array();
			if(count($atribut_id)>0){
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
				if ($this->db->query($sql)) {
					# code...
					$tindakan_id = $this->db->query("SELECT id AS tindakan_id FROM tindakan WHERE jenis_id=".$jenis_id)->result_array();
					if (count($tindakan_id)>0) {
						$form_id = $this->db->query("SELECT form.id AS form_id FROM form INNER JOIN jadwal ON form.jadwal_id=jadwal.id WHERE jadwal.jenis_id=".$jenis_id)->result_array();
						if (count($form_id)>0) {
							# code...
							foreach ($form_id as $form) {
								# code...
								if ($this->db->query("INSERT INTO form_row(aset_id,form_id) VALUES(".$aset_id.",".$form['form_id'].")")) {
									$row_id = $this->db->query('SELECT LAST_INSERT_ID()')->row_array()['LAST_INSERT_ID()'];
									# code...
									$sql_ = "INSERT INTO kondisi(formrow_id,tindakan_id) VALUES ";
									$index_ = 1;
									foreach ($tindakan_id as $tindakan) {
										# code...
										if ($index_==1) {
											# code...
											$sql_ = $sql_.' ('.$row_id.','.$tindakan['tindakan_id'].')';
											$index_ = $index_+1;
											continue;
										}
										$sql_ = $sql_.', ('.$row_id.','.$tindakan['tindakan_id'].')';
									}
									if ($this->db->query($sql_)) {
										# code...
										continue;
									} else {
										# code...
										return FALSE;
									}
								} else {
									# code...
									return FALSE;
								}
							}
						} else {
							# code...
							return FALSE;
						}
					}
					
				} else {
					# code...
					return FALSE;
				}
			}
		} else {
			# code...
			return FALSE;
		}
		return TRUE;
	}

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
		$query1 = $this->db->query("DELETE FROM atribut_aset WHERE aset_id=".$id);
		$query2 = $this->db->query("DELETE FROM kondisi WHERE kondisi.formrow_id=(SELECT form_row.id FROM form_row WHERE form_row.aset_id=".$id.")");
		if($query1 and $query2){
			$query3 = $this->db->query("DELETE FROM form_row WHERE form_row.aset_id=".$id);
			$query4 = $this->db->query("DELETE FROM asets WHERE id=".$id);
			if($query3 and $query4){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}



}

/* End of file Aset_model.php */
/* Location: ./application/models/Aset_model.php */