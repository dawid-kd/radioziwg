<?php
class Answer_model extends CI_Model {
	private $table = 'answer';

	public function __construct() {
		parent::__construct();
	}

	public function addAnswer($data) {
		$this -> db -> insert($this -> table, $data);
	}

	public function delAnswer($id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($this -> table);
	}
	
	public function setAnswer($id, $data) {
		$this -> db -> where('id', $id);
		$this -> db -> update($this -> table, $data);
	}

	public function getAnswers($competition_id) {
		$this -> db -> where('id_competition', $competition_id);
		$query = $this -> db -> get($this -> table);
		return $query -> result_array();
	}

}
?>