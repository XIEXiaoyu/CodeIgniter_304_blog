<?php
class Blogs extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Blogs_model');
		$this->load->model('Categories_model');
		$this->load->helper('url_helper');
		$this->load->model('Service');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function home()
	{
		// Get all the categories including the category's name and its introdcution.
		$data = $this->Service->get_latest_blogs();

		// Get the only one latest blog among all the categories.
		$data['latest_blog'] = $this->Blogs_model->get_latest_blog();

		// load the view
		$this->load->view('templates/header', $data);
		$this->load->view('blogs/home', $data);
		$this->load->view('templates/footer');
	}

	public function about()
    {
    	// Get all the categories including the category's name and its introdcution.
		$data = $this->Service->get_latest_blogs();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/about', $data);
        $this->load->view('templates/footer');
    }

	// create a new blog
	public function create()
	{
		//check if the user has signin or not, only signed in user has the authority to view the create page. If the user is not signed in and visit the 'create' page, redirect the user to the sign in page. 
		if(!isset($_SESSION['email']))
		{
			redirect('admin/login');
		}

		// Get all the categories including the category's name and its introdcution.
		$data = $this->Service->get_latest_blogs();

		//If the data from the form is valid, we insert it into the database, then redirect to the 'show' page. If the data is not valid, we re-populate the data to the 'create' page.

		//set validation rules for the form input
		$config = array(
	        array(
	                'field' => 'author',
	                'label' => 'Author',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'category_id',
	                'label' => 'Category id',
	                'rules' => 'required',
	        ),
	        array(
	                'field' => 'title',
	                'label' => 'Blog title',
	                'rules' => 'required'
	        ),
	        array(
	                'field' => 'editor1',
	                'label' => 'CKEditor',
	                'rules' => 'required'
	        )
		);

		$this->form_validation->set_rules($config);

		// if there is any invalid input, back to 'create' page
		if ($this->form_validation->run() === FALSE)
    	{
			$this->load->view('templates/header', $data);
	        $this->load->view('blogs/create');
	        $this->load->view('templates/footer');
    	}

    	// if all form input data are valid, insert the data into databae, then redirect to page 'show'
    	else
    	{
	        $this->Blogs_model->insert_blog(); // insert the blog into the databae table 'blogs'

	        redirect('blogs/home');// redirect to page show
    	}        
	}

	// this function is to show all the articles of a certain category according to the category_id provided
	public function show($category_id)
	{
		// Get all the categories including the category's name and its introdcution.
		$data = $this->Service->get_latest_blogs();

		// get all the blogs of a certain category
		$data['a_category_blogs'] = $this->Blogs_model->get_category_blogs($category_id);

		// to do: need to tackle with the situation of no blogs existing.

		$this->load->view('templates/header', $data);
	    $this->load->view('blogs/show', $data);
	    $this->load->view('templates/footer');
	}

	// the parameter $id is the 'id' value in the database table 'blogs'. Given an 'id', we will get the blog from the database.
	public function blog($id)
	{
		// Get all the categories including the category's name and its introdcution.
		$data = $this->Service->get_latest_blogs();
		
		// get the blog by id
		$data['blog'] = $this->Blogs_model->get_blog($id);

		$this->load->view('templates/header', $data);
	    $this->load->view('blogs/blog', $data);
	    $this->load->view('templates/footer');
	}
}