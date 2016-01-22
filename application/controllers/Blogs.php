<?php
class Blogs extends CI_Controller {


	public function view($page='home') {
		if( ! file_exists(APPPATH.'views/blogs/'.$page.'.php'))
		{
			// we don't have a page for that
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('blogs/'.$page);
		$this->load->view('templates/footer');
	}
}