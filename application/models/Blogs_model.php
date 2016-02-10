<?php 
class Blogs_model extends CI_model 
{
	public function __construct()
	{
		$this->load->database();
	}

	// This function returns the latest blog of each category, and they will be displayed in the left pannel.
	public function get_latest_blogs()
	{
		$query = $this->db->query('SELECT author, content, created_at, category_id, title FROM blogs WHERE created_at in ( SELECT MAX(created_at) from blogs group by category_id)'); //http://stackoverflow.com/questions/1049702/create-a-sql-query-to-retrieve-most-recent-records

		return $query->result();
	}

	// This function returns the latest blog of all categories.
	public function get_latest_blog()
	{
		$query = $this->db->query('SELECT * FROM blogs WHERE created_at=(SELECT MAX(created_at) FROM blogs)'); //http://stackoverflow.com/questions/2770600/mysql-select-the-last-inserted-row-easiest-way

		return $query->result();
	}

	// insert a new piece of blog into the database table 'blogs'
	public function insert_blog()
	{
		$this->load->helper('url');

		$data = array(
        	'author' => $this->input->post('author'),
        	'title' => $this->input->post('title'),
        	'category_id' => $this->input->post('category_id'),
        	'content' => $this->input->post('editor1'),
    	);
		
		// insert into the blogs table
		$this->db->insert('blogs', $data);
	}
}

?>