<?php 
class Service extends CI_Model {
	public function __construct() 
	{
		$this->load->model('Blogs_model');
		$this->load->model('Categories_model');
	}

	public function get_latest_blogs()
	{
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
		
		return $data;		 
	}
}
?>