<?php
class Survey_model extends CI_Model {
	private $table = 'survey';
	
	public function __construct() {
		parent::__construct();
	}

	public function addSurvey($data) {
		$this -> db -> insert($this -> table, $data);
	}

	public function setSurvey($id, $data) {
		$this -> db -> where('id', $id);
		$this -> db -> update($this -> table, $data);
	}

	public function delSurvey($id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($this -> table);
	}

	public function getSurvey($id) {
		$this -> db -> where('id', $id);
		$query = $this -> db -> get($this -> table);
		return $query -> row_array();
	}
	public function getLastActiveSurvey() {
		$this -> db -> where('current', 'T');
		$this -> db -> order_by("id", "desc"); 
		$query = $this -> db -> get($this -> table);
		return $query -> row_array();
	}
	public function getSurveys() {
		$query = $this -> db -> get($this -> table);
		return $query -> result_array();
	}

}
?>