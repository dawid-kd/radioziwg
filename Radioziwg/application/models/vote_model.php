<?php
class Vote_model extends CI_Model {
	private $table = 'vote';
	
	public function __construct() {
		parent::__construct();
	}

	public function addVote($data) {
		$this -> db -> insert($this -> table, $data);
	}

	public function setVote($id, $data) {
		$this -> db -> where('id', $id);
		$this -> db -> update($this -> table, $data);
	}

	public function delVote($id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($this -> table);
	}

	public function getVote($id) {
		$this -> db -> where('id', $id);
		$query = $this -> db -> get($this -> table);
		return $query -> row_array();
	}
	public function getVotes() {
		$query = $this -> db -> get($this -> table);
		return $query -> result_array();
	}

}
?>