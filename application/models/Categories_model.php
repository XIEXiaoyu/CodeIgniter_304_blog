<?php 
class Categories_model extends CI_model 
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_categories($category_id = false)
	{
		if($category_id == false)
		{
			$query = $this->db->get('categories');
			return $query->result();
		}

		$query = $this->db->get_where('categories', array('category_id' => $category_id));
		return $query->row();
	}
} 

?>