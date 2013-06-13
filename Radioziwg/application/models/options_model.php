<?php
class Options_model extends CI_Model {
	private $table = 'options';
	
	public function __construct() {
		parent::__construct();
	}

	public function addOptions($data) {
		$this -> db -> insert($this -> table, $data);
	}

	public function setOptions($id, $data) {
		$this -> db -> where('id', $id);
		$this -> db -> update($this -> table, $data);
	}

	public function delOptions($id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($this -> table);
	}

	public function getOption($id) {
		$this -> db -> where('id', $id);
		$query = $this -> db -> get($this -> table);
		return $query -> row_array();
	}
	public function getOptions($id) {
		$this->db->where('id_survey', $id);
		$query = $this -> db -> get($this -> table);
		return $query -> result_array();
	}
	public function increaseCounter($id) {
		$this -> db -> where('id', $id);
		$query = $this -> db -> get($this -> table) -> row_array();
		$query['option_count']++;
		$this -> db -> where('id', $id);
		$this -> db -> update($this -> table, $query);
	}

}
?>