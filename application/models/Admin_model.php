<?php 
class Admin_model extends CI_model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_admin_info() 
	{
		//get the admin info fromt the database
		$query = $this->db->query('SELECT * FROM admin limit 1'); 

		return $query->result();		
	}
}
?>