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

	public function show($page='home')
	{
		// Get all the categories including the category's name and its introdcution.
		$data = $this->Service->get_latest_blogs();

		// Get the latest blog among all the categories.
		$data['latest_blog'] = $this->Blogs_model->get_latest_blog();

		// load the view
		$this->load->view('templates/header');
		$this->load->view('blogs/'.$page, $data);
		$this->load->view('templates/footer');
	}

	// create a new blog
	public function create()
	{
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
			$this->load->view('templates/header');
	        $this->load->view('blogs/create', $data);
	        $this->load->view('templates/footer');
    	}

    	// if all form input data are valid, insert the data into databae, then redirect to page 'show'
    	else
    	{
	        $this->Blogs_model->insert_blog(); // insert the blog into the databae table 'blogs'

	        redirect('blogs/home');// redirect to page show
    	}        
	}
}