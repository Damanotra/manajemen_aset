<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model('aset_model');
		$this->load->model('jenisaset_model');
		$this->load->model('Jadwal_model');
		$this->load->model('Atribut_model');
		$this->load->model('Tindakan_model');

		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
	}

	public $month_map = array(
		'1' => 'Januari' ,
		'2' => 'Februari',
		'3' => 'Maret',
		'4' => 'April',
		'5' => 'Mei',
		'6' => 'Juni',
		'7' => 'Juli',
		'8' => 'Agustus',
		'9' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember');
	function month_convert($angka)
	{
		# code...
		return $month_map($angka);
	}
	public function addJenis()
	{
		# code...
		$jenisAset = $this->jenisaset_model;
		$validation = $this->form_validation;
		$validation->set_rules($jenisAset->tambah_JenisAset_rules());
		if($validation->run()){
			$post = $this->input->post();
			$nama = $post['nama'];
			$satuan = $post['satuan'];
			$parent = explode("-", $post['parent'])[0];
			if ($parent=='') {
				# code...
				$parent = NULL;
			}
 			$jenisAset->add($nama,$satuan,$parent);
			$this->session->set_flashdata('success', 'Berhasil ditambahkan');
		}
		$data['parent'] = $jenisAset->getAllParent();
		$this->load->view('add_jenis',$data);
	}

	private function searcharray($value, $key, $target, $array) {
   		foreach ($array as $k) {
       		if ($k[$key] == $value) {
            return $k[$target];
       		}
   		}
   		return null;
	}

	public function index()
	{
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		redirect('dashboard/showAsetAll');
	}
	public function showAsetByJenis($jenis_id)
	{
		# code...
		$records = $this->aset_model->getByJenis($jenis_id);
		if (!empty($records)) {
			# code...
			$columns = array_keys($records[0]);
			$data['table'] = 'aset';
			$data['records'] = $records;
			$data['columns'] = $columns;
		}
		else{
			$data['exception'] = "The table is empty";
		}
		$this->load->view('dashboard', $data);
	}

	public function showAtributAll()
	{
		# code...
		$records = $this->Atribut_model->getall();
		$index = 1;
		foreach ($records as &$rec) {
			# code...
			$rec['No'] = $index;
			$index = $index+1;
			$rec = array('No' => $rec['No']) + $rec;
			if ($rec['Tipe']==1) {
				$rec['Tipe']='Text';
			}
		}
		$columns = array_keys($records[0]);
		$data['table'] = 'atribut';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard', $data);
	}

	public function JenisPemeriksaanAll()
	{
		# code...
		$records = $this->Tindakan_model->getAll();
		$columns = array_keys($records[0]); //ambil nama kolom
		$data['table'] = 'tindakan';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard', $data);
	}

	public function addPemeriksaan()
	{
		$tindakan = $this->Tindakan_model;
		$validation = $this->form_validation;
		$validation->set_rules($tindakan->rules());
		if($validation->run()){
			$post = $this->input->post();
			$pemeriksaan = $post['pemeriksaan'];
			$jenis_id = explode("-", $post['jenis_id'])[0];
			$deskripsi = $post['Deskripsi'];
 			$tindakan->add($pemeriksaan,$jenis_id,$deskripsi);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		$data['jenis'] = $this->jenisaset_model->getAll();
		function sortByOrder($a, $b) {
    		return $a['id'] - $b['id'];
		}
		usort($data['jenis'], 'sortByOrder');
		$this->load->view('add_pemeriksaan',$data);
	}


	public function showAsetAll()
	{
		# code...
		$records = $this->aset_model->getall();
		$index = 1;
		foreach ($records as &$rec) {
			# code...
			$rec['No'] = $index;
			$index = $index+1;
			$rec = array('No' => $rec['No']) + $rec;
		}
		$columns = array_keys($records[0]);
		$data['table'] = 'aset';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard', $data);
	}

	public function showAsetById($id)
	{
		# code...
		$records = $this->aset_model->getById($id);
		$columns = array_keys($records[0]);
		$data['table'] = 'aset';
		$data['records'] = $records;
		$data['columns'] = $columns;
		
		$this->load->view('dashboard', $data);
	}

	public function showJenisAsetById($id)
	{
		if($this->session->userdata('authenticated')==false){
			redirect('login');
		}
		# code...
		$records = $this->jenisaset_model->getById($id);
		$columns = array_keys($records[0]);
		$data['table'] = 'jenis aset';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard.php',$data);
	}

	public function showJenisAll()
	{
		# code...
		$records = $this->jenisaset_model->getAll();
		$index = 1;
		$subindex = 1;
		$list_master = array();
		foreach ($records as &$rec) {
			# jika punya parent
			if(!is_null($rec['Kelompok'])) {
				#cari nomor parent
				$index_master = $this->searcharray($rec['Kelompok'],'id','No',$records);
				#pasang nomor parent ke nomor
				if(!isset($list_master[$index_master])) {
					$list_master[$index_master] = array();
					array_push($list_master[$index_master],1);
				}
				else{
					array_push($list_master[$index_master], end($list_master[$index_master])+1 );
				}

				$rec['No'] = $index_master.'.'.end($list_master[$index_master]);
				$rec = array('No' => $rec['No']) + $rec;
				// continue;
			}
			else{
				$rec['No'] = $index;
				$rec = array('No' => $rec['No']) + $rec;
				$index = $index+1;
			}
			// $subindex = 1;
			// $rec['No'] = $index;
			// $rec = array('No' => $rec['No']) + $rec;
			// $index = $index+1;
		}
		
		$columns = array_keys($records[0]);
		
		$data['table'] = 'jenis aset';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard.php',$data);
	}

	public function showJadwalByJenis($id)
	{
		$records = $this->Jadwal_model->getByJenis(1);
		$columns = array_keys($records[0]);
		foreach ($records as &$rec) {
			# code...
			$rec['Bulan'] = $this->month_map[$rec['Bulan']];
		}
		$data['table'] = 'jadwal';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard.php',$data);
	}

	public function showJadwalAll()
	{
		# code...
		$records = $this->Jadwal_model->getAll();
		$columns = array_keys($records[0]);
		foreach ($records as &$rec) {
			$rec['Bulan'] = $this->month_map[$rec['Bulan']];
		}
		$data['table'] = 'jadwal';
		$data['records'] = $records;
		$data['columns'] = $columns;
		$this->load->view('dashboard.php',$data);
	}

	public function addAset()
	{
		$aset = $this->aset_model;
		$validation = $this->form_validation;
		$validation->set_rules($aset->rules());
		if($validation->run()){
			$post = $this->input->post();
			$Nama = $post['Nama'];
			$jenis_id = explode("-", $post['jenis_id'])[0];
 			$aset->add($Nama,$jenis_id);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		$data['jenis'] = $this->jenisaset_model->getAll();
		function sortByOrder($a, $b) {
    		return $a['id'] - $b['id'];
		}
		usort($data['jenis'], 'sortByOrder');
		$this->load->view('add_aset',$data);
	}

	public function addAtribut()
	{
		# code...
		$atribut = $this->Atribut_model;
		$validation = $this->form_validation;
		$validation->set_rules($atribut->rules());
		if($validation->run()){
			$post = $this->input->post();
			$data['nama_atribut'] = $post['nama_atribut'];
			$data['nama_tanpa_spasi'] = $post['nama_tanpa_spasi'];
			$data['tipe'] = explode("-", $post['tipe'])[0];
			$data['keterangan'] = $post['keterangan'];
			$data['jenis_id'] = explode("-", $post['jenis_id'])[0];
			if($atribut->add($data['nama_atribut'],$data['nama_tanpa_spasi'],$data['tipe'],$data['keterangan'],$data['jenis_id'])){
				$this->session->set_flashdata('success', 'Berhasil Disimpan');
			}
			else{
				$this->session->set_flashdata('gagal', 'Gagal Menyimpan atribut. Hapus atribut jika tersimpan. Kemudian buat ulang');
			}
		}
		$data['jenis'] = $this->jenisaset_model->getAll();
		function sortByOrder($a, $b) {
    		return $a['id'] - $b['id'];
		}
		usort($data['jenis'], 'sortByOrder');
		$this->load->view('add_atribut',$data);
	}


	public function editAtribut($id)
	{
		$atribut = $this->Atribut_model->getById($id);
		$validation = $this->form_validation;
		$validation->set_rules($this->Atribut_model->rules());
		if($validation->run()){
			$post = $this->input->post();
			$data['nama_atribut'] = $post['nama_atribut'];
			$data['nama_tanpa_spasi'] = $post['nama_tanpa_spasi'];
			$data['tipe'] = explode("-", $post['tipe'])[0];
			$data['keterangan'] = $post['keterangan'];
			$data['jenis_id'] = explode("-", $post['jenis_id'])[0];
			if($this->Atribut_model->edit($id,$data['nama_atribut'],$data['nama_tanpa_spasi'],$data['tipe'],$data['keterangan'],$data['jenis_id'])){
				$this->session->set_flashdata('success', 'Berhasil Disimpan');
			}
			else{
				$this->session->set_flashdata('gagal', 'Gagal Menyimpan Data');
			}
			redirect('dashboard/editAtribut/'.$id,'refresh');
		}
		$data['atribut']= $atribut;
		$data['jenis'] = $this->jenisaset_model->getAll();
		function sortByOrder($a, $b) {
    		return $a['id'] - $b['id'];
		}
		usort($data['jenis'], 'sortByOrder');
		$this->load->view('edit_atribut.php',$data);
	}

	public function editAset($id){
		$aset = $this->aset_model->getAset($id);
		$validation = $this->form_validation;
		$validation->set_rules('Nama','Nama','required');
		if($validation->run()){
			$post = $this->input->post();
			$Nama = $post['Nama'];
			$this->aset_model->edit($id,$Nama,$aset['aset'][0]['Jenis']);
			$variable = array_keys($post);
			foreach ($variable as $var) {
				# code...
				if($var!='Nama'){
					$query2 = $this->db->query("UPDATE atribut_aset SET nilai='".$post[$var]."' WHERE atribut_aset.aset_id=".$id." AND atribut_aset.atributtetap_id = (SELECT id FROM atribut WHERE atribut.nama_tanpa_spasi='".$var."' AND atribut.jenis_id=(SELECT jenis_id FROM asets WHERE asets.id=".$id."))");
				}
			}
			if($query2) $this->session->set_flashdata('success', 'Berhasil disimpan');
			else $this->session->set_flashdata('pesan', 'Gagal');
			redirect('dashboard/editAset/'.$id,'refresh');
		}
		$this->load->view('editAset.php',$aset);
	}

	public function addJadwalAset()
	{
		$asetJadwal = $this->Jadwal_model;
		$validation = $this->form_validation;
		$validation->set_rules($asetJadwal->JadwalRules());
		if($validation->run()){
			$post = $this->input->post();
			$minggu = $post['minggu'];
			$bulan = $post['bulan'];
			$tahun = $post['tahun'];
			$jenis_id = explode("-", $post['jenis_id'])[0];
			$jenis_perawatan = $post['jenis_perawatan'];
 			$asetJadwal->add($minggu,$bulan,$tahun, $jenis_id,$jenis_perawatan);
			$this->session->set_flashdata('success', 'Berhasil diperbaharui');
		}
		$data['jenis'] = $this->jenisaset_model->getall();
		function sortByOrder($a, $b) {
    		return $a['id'] - $b['id'];
		}
		usort($data['jenis'], 'sortByOrder');
		$this->load->view('add_JadwalAset',$data);
	}

	public function editJadwal($id)
	{
		$asetJadwal = $this->Jadwal_model;
		$validation = $this->form_validation;
		$validation->set_rules($asetJadwal->JadwalRules());
		if($validation->run()){
			$post = $this->input->post();
			$minggu = $post['minggu'];
			$bulan = $post['bulan'];
			$tahun = $post['tahun'];
			$jenis_id = explode("-", $post['jenis_id'])[0];
			$jenis_perawatan = $post['jenis_perawatan'];
 			$asetJadwal->edit($id,$minggu,$bulan,$tahun, $jenis_id,$jenis_perawatan);
			$this->session->set_flashdata('success', 'Berhasil diperbaharui');
		}
		$data['jenis'] = $this->jenisaset_model->getall();
		function sortByOrder($a, $b) {
    		return $a['id'] - $b['id'];
		} 
		usort($data['jenis'], 'sortByOrder');
		$data['awal'] = $asetJadwal->getById($id);
		$this->load->view('edit_JadwalAset',$data);
	}


	public function editJenis($id)
	{
		$jenisAset = $this->jenisaset_model;
		$validation = $this->form_validation;
		$validation->set_rules($jenisAset->tambah_JenisAset_rules());
		if($validation->run()){
			$post = $this->input->post();
			$nama = $post['nama'];
			$satuan = $post['satuan'];
			$parent = explode("-", $post['parent'])[0];
			if ($parent=='') {
				$parent = NULL;
			}
 			$jenisAset->edit($id,$nama,$satuan,$parent);
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		$data['parent'] = $jenisAset->getAllParent();
		$data['awal'] = $jenisAset->getById($id)[0];
		$this->load->view('editjenis',$data);
	}

	public function editAsetProses()
	{
		# code...
		$post = $this->input->post();
		$merk = $post["merk"];
		$kapasitas = $post["kapasitas"];
		$lokasi = $post["lokasi"];
		$jenis_id = explode("-", $post['jenis_id'])[0];
		
        $this->aset_model->edit($id,$merk,$kapasitas,$lokasi,$jenis_id);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
		redirect('dashboard/showAsetAll');
	}

	public function hapusJadwal($id)
	{
		if($this->Jadwal_model->delete($id)){
			$this->session->set_flashdata('success', 'Sukses dihapus');
		}
		else{
			$this->session->set_flashdata('pesan', 'Gagal dihapus, ada kesalahan. Cek table yang berkaitan');
		}
		redirect('dashboard/showJadwalAll','refresh');
	}

	public function aboutUs()
	{
		$this->load->view('aboutUs.php');
	}

	public function hapusAset($id)
	{
		if($this->aset_model->delete($id)){
			$this->session->set_flashdata('success', 'Sukses dihapus');
		}
		else{
			$this->session->set_flashdata('pesan', 'Gagal dihapus, ada kesalahan. Cek table yang berkaitan');
		}
		redirect('dashboard/showAsetAll','refresh');
	}

	public function hapusAtribut($id)
	{
		if($this->Atribut_model->delete($id)){
			$this->session->set_flashdata('success', 'Sukses dihapus');
		}
		else{
			$this->session->set_flashdata('pesan', 'Gagal dihapus, ada kesalahan. Cek table yang berkaitan');
		}
		redirect('dashboard/showAtributAll','refresh');
	}

	public function hapusJenis($id)
	{
		if($this->jenisaset_model->delete($id)){
			$this->session->set_flashdata('success','Sukses dihapus');
		}
		else{
			$this->session->set_flashdata('pesan', 'Gagal dihapus, ada kesalahan. Cek table yang berkaitan');
		}
		redirect('dashboard/showJenisAll','refresh');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */