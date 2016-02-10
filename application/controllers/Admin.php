<?php 
class Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		// $this->load->model('Admin_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function login()
	{
		// load the view. I am using the view from this post https://gist.github.com/bMinaise/7329874
		$this->load->view('admin/login');
	}

	// to process the login data
	public function process()
	{
		// verify if the user is authenticated

		// if verified successfully, then we put the username into the sesssion
		$_SESSION['email'] = $_POST['email'];
		redirect('blogs/create');
	}

	public function logout()
	{
		// destroy the session
		unset($_SESSION['email']);

		// redirect to the login view
		redirect('admin/login');
	}
}
?>