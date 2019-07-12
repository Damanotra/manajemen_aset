<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//controller for testing model and view
//act as a driver

class Test extends CI_Controller {

	public function index()
	{
		$this->load->model('user_model');
		$user = $this->user_model;
		$result = $user->add("ra","ra","ra","ra");
		echo $result;
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */