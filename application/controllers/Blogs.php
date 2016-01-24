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

		$this->load->view('templates/header');
		$this->load->view('blogs/'.$page, $data);
		$this->load->view('templates/footer');
	}
}