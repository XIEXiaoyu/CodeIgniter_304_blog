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

	public function put_blog_content($author, $blog_title, $category_id, $blog_content, $created_at)
	{
		// insert into the blogs table
		$data = array(
		'author' => $author,
		'title' => $title,
		'category_id' => $category_id,
        'content' => $content,
        'created_at' => $created_at,
		);

		$this->db->insert('blogs', $data);
	}
}

?>