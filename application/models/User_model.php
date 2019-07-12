<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $_table = "users";
	public $username;
	public $email;
	public $password;

	public function signup_rules()
	{
		return [
			['field'=>'username',
			'label'=>'Username',
			'rules'=>'required'],

			['field'=>'nama',
			'label'=>'Nama',
			'rules'=>'required'],

			['field'=>'email',
			'label'=>'Email',
			'rules'=>'required'],

			['field'=>'password',
			'label'=>'Password',
			'rules'=>'required'],
		];
		# code...
	}

	public function cekUser($username, $password)
	{
		//var_dump($username);
		$query = "email = '".$username."' OR username = '".$username."'";
		var_dump($query);
   		$this->db->where($query);
    	$this->db->where('password', $password);
    	$result = $this->db->get($this->_table)->row_array();
    	return $result;
		# code...
	}
	public function add($username, $nama, $email, $password)
	{
		$this->username = $username;
		$this->nama = $nama;
		$this->email = $email;
		$this->password = $password;
		$this->db->insert($this->_table,$this);
		# code...
	}

	public function getById($username)
	{
		$this->db->get_where($this->_table,array('username' => $username))
		# code...
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */