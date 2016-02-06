<?php 
class Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		// $this->load->model('Admin_model');
		$this->load->helper('url_helper');
	}

	public function login()
	{
		// load the view
		$this->load->view('admin/login');
	}
}
?>