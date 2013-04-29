<?php
class Competition_model extends CI_Model {
	private $table = 'competition';
	public function __construct() {
		parent::__construct();
	}

	public function addCompetition($data) {
		$this -> db -> insert($this -> table, $data);
	}

	public function setCompetition($id, $data) {
		$this -> db -> where('id', $id);
		$this -> db -> update($this -> table, $data);
	}

	public function delCompetition($id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($this -> table);
	}

	public function getActiveCompetition() {
		$this -> db -> where('current', 'T');
		$query = $this -> db -> get($this -> table);
		return $query -> result_array();
	}

	public function getOneCompetition($id) {
		$this -> db -> where('id', $id);
		$query = $this -> db -> get($this -> table);
		return $query -> row_array();
	}

	public function getAllCompetitions() {
		$this->db->order_by('end_date', 'DESC');
		$query = $this -> db -> get($this -> table);
		return $query -> result_array();
	}

}
?>