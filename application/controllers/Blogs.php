<?php
class Blogs extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Blogs_model');
		$this->load->model('Categories_model');
		$this->load->helper('url_helper');
	}

	public function view($page='home')
	{
		// Get all the categories including the category's name and its introdcution.
		$_categories = $this->Categories_model->get_categories();

		$categories = array();

		foreach($_categories as $c)
		{
			$categories[$c->id] = $c;
		}

		$data['categories'] = $categories;

		// Get all the latest blogs 
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

	public function submit()
	{
		// get the post values
		$author = $_POST['author'];
		$title = $_POST['blog_title'];
		$category_id = $_POST['category_id'];		
		$content = $_POST['editor1']; 

		// get the time that the blog is submitted
		$created_at = time();

		// call put_blog_content() from Blogs_model
		$this->Categories_model->put_blog_content($author, $title, $category_id, $content, $created_at);

		// set a tag for the home view, so it knows to display the view with content rather than with CKEditor
		$data['tag'] = 'content_submitted';

		// go the the view of home
		$this->load->view('templates/header');
		$this->load->view('blogs/'.$page, $data);
		$this->load->view('templates/footer');
	}
}