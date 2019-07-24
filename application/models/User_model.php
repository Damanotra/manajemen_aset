<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $_table = "users";
	public $username;
	public $nama;
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

	public function getAll()
	{
		
		return $this->db->get($this->_table)->result();
		# code...
		
	}

	public function cekUser($username, $password)
	{
		//var_dump($username);
		$query = "email = '".$username."' OR username = '".$username."'";
   		$this->db->where($query);
    	$this->db->where('password', $password);
    	$result = $this->db->get($this->_table)->row_array();
    	return $result;
		# code...
	}


	//insert new row to user table, all parameter are required, make sure to implement validation form
	//return true if success, but doesnt return false on failure
	public function add($username, $nama, $email, $password)
	{
		$this->username = $username;
		$this->nama = $nama;
		$this->email = $email;
		$this->password = $password;
		return $this->db->insert($this->_table,$this);
		# code...
	}


	//get user by username
	//return all atribute of usertable where username = parameter
	//returned as array
	public function getById($username)
	{
		return $this->db->get_where($this->_table,array('username' => $username))->row_array();
		# code...
	}

	public function delete($username)
	{
		return $this->db->delete($this->_table,array('username'=>$username));
		# code...
	}


	//edit the atributes row of user table, username cant be changed only for specifying which row want to be changed
	//return true when success, not returning false when failure
	public function edit($username, $nama, $email, $password)
	{
		$data = array(
       	'nama' => $nama,
        'email' => $email,
    	'password' => $password
		);
		
		return $this->db->update($this->_table,$data,array('username'=>$username));
		# code...
	}



}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */