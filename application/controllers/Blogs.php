<?php
class Blogs extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Blogs_model');
		$this->load->model('Categories_model');
		$this->load->helper('url_helper');
	}

	public function show($page='home')
	{
		// Get all the categories including the category's name and its introdcution.
		$_categories = $this->Categories_model->get_categories();

		$categories = array();

		foreach($_categories as $c)
		{
			$categories[$c->id] = $c;
		}

		$data['categories'] = $categories;

		// Get all the latest blogs of all categories
		$_latest_blogs = $this->Blogs_model->get_latest_blogs();

		$latest_blogs = array();

		foreach($_latest_blogs as $b)
		{
			$latest_blogs[$b->category_id] = $b;
		}

		$data['latest_blogs'] = $latest_blogs;

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
		$this->load->helper('form');

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

        $this->load->view('templates/header');
        $this->load->view('blogs/create');
        $this->load->view('templates/footer');
	}

	public function process()
	{
		// process() processes the submitted form data. If the data from the form is valid, we insert it into the database, then redirect to the 'show' page. If the data is not valid, then redirect to the 'create' page.
		//
		$this->load->library('form_validation');

		// if there is any invalid input, redirect to page 'create'
		if ($this->form_validation->run() === FALSE)
    	{
	        $this->load->view('templates/header');
	        $this->load->view('blogs/create');
	        $this->load->view('templates/footer');
    	}
    	// if all form input data are valid, insert the data into databae, then redirect to page 'show'
    	else
    	{
	        $this->blogs_model->set_blogs(); // insert the blog into the databae table 'blogs'
	        $this->load->view('blogs/show');
    	}
	}



	public function test()
	{
		$this->load->view('blogs/test');
	}
}