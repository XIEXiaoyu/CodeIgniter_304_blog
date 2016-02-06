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
		// load the view. I am using the view from this post https://gist.github.com/bMinaise/7329874
		$this->load->view('admin/login');
	}
}
?>