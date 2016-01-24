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
}

?>