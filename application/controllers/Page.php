<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller
{	
	
	public function sudah_login()
	{
		$this->load->view('dashboard');
	}
	public function __construct()
	{
		parent::__construct();
	}
}