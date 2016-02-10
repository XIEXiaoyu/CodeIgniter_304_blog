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

        $this->load->view('templates/header');
        $this->load->view('blogs/create', $data);
        $this->load->view('templates/footer');
	}

	public function process()
	{
		// process() processes the submitted form data. If the data from the form is valid, we insert it into the database, then redirect to the 'show' page. If the data is not valid, then redirect to the 'create' page.//

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

		// if there is any invalid input, redirect to page 'create'
		if ($this->form_validation->run() === FALSE)
    	{
	        // put the input form data into the sesseion and must be of flash type
	        $formInputData = array(
        		'author'  => $_POST['author'],
        		'category_id'  => $_POST['category_id'],
        		'title' => $_POST['title'],
        		'editor1' => $_POST['editor1']
			);

			$this->session->set_flashdata($formInputData);
			echo "**************************";
			var_dump($_SESSION['category_id']);

	  //       $author = $_POST['author'];
	  //       $category_id = $_POST['category_id'];
	  //       $form_blog_title = $_POST['form_blog_title'];
	  //       $editor1 = $_POST['editor1'];

	  //       $_SESSION['author'] = $author;
			// $this->session->mark_as_flash('author');
			// $_SESSION['category_id'] = $category_id;
			// $this->session->mark_as_flash('category_id');
			// $_SESSION['form_blog_title'] = $form_blog_title;
			// $this->session->mark_as_flash('form_blog_title');
			// $_SESSION['editor1'] = $editor1;
			// $this->session->mark_as_flash('editor1');

	        redirect('blogs/create');
    	}

    	// if all form input data are valid, insert the data into databae, then redirect to page 'show'
    	else
    	{
	        $this->Blogs_model->insert_blog(); // insert the blog into the databae table 'blogs'

	        redirect('blogs/home');// redirect to page show
    	}
	}

	public function test()
	{
		$this->load->view('blogs/test');
	}
}