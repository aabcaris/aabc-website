<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {

	private $table_name;

	public function __construct()
	{
		parent::__construct();
		
		$this->table_name = 'user';
		//koneksi ke db
		$this->load->database();
	}

	public function read_data()
	{
		return $this->db->get($this->table_name)->result();
	}

	public function create_data($data = null)
	{
		$result = FALSE;
		if ($data) {
			$result = $this->db->insert($this->table_name, $data);
		}

		return $result;
	}

	public function get_data($user_id = null)
	{
		$this->db->where('user_id', (int) $user_id);
		return $this->db->get($this->table_name)->row();
	}

	public function update_data($id, $data)
	{
		$this->db->where('user_id', (int) $id);
		return $this->db->update($this->table_name, $data);
	}

	public function delete_data($id)
	{
		$this->db->where('user_id', (int) $id);
		return $this->db->delete($this->table_name);
	}

}