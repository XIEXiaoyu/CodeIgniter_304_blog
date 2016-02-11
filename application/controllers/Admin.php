<?php 
class Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		// $this->load->model('Admin_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->model('Admin_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function login() // load the view. I am using the view from this post https://gist.github.com/bMinaise/7329874
	{		
		//set validation rules for the email and password input field
		$config = array(
	        array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'password',
	                'label' => 'Password',
	                'rules' => 'required',
	                'errors' => array(
	                    'required' => 'You must provide a %s.',
	                )
	        )
		);

		$this->form_validation->set_rules($config);

		// need to check if the 'email' and 'password' are not empty, if not empty, then go on to check if the email and password provided are matching the ones stored in the database, if not matching, request to the same webpage, and display the error message of which one is not matching. If empty, then request the same webpage to show the validation errors.

		if ($this->form_validation->run() == true) // if the 'email' and 'password' are not empty
		{
			// verify if the user's username and password are correct
			$record = $this->Admin_model->get_admin_info();// get the username and password from the database

			$data['error_msg'] = "";
			if($_POST['email'] != $record[0]->user_name)
			{
				$data['error_msg'] = "This email does not exist.";
			}

			if(empty($data['error_msg']))
			{
				if($_POST['password'] != $record[0]->password)
				{
					$data['error_msg'] = "This password is not correct.";
				}
			}
			if(empty($data['error_msg']))
			{
				echo "what";
				$_SESSION['email'] = $_POST['email']; // if verified successfully, then we put the username into the sesssion
				redirect('blogs/create');
			}
			else
			{
				$this->load->view('admin/login', $data);
			}
		}
		else // if either one of the 'email' and 'password' is empty, then request the same webpage, and display the validation errors.
		{
			$this->load->view('admin/login');
		}		
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