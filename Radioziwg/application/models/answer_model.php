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
	
	public function getAnswer($user_id, $competition_id){
		$this -> db -> where('id_competition', $competition_id);
		$this -> db -> where('id_user', $user_id);
		return $query = $this -> db -> get($this -> table)->row_array();
	}

	public function getAnswers($competition_id) {
		$this -> db -> where('id_competition', $competition_id);
		$query = $this -> db -> get($this -> table);
		return $query -> result_array();
	}
	public function checkAnswer($user_id, $competition_id){//sprawdza czy user bral udzial w konkursie
		$this -> db -> where('id_competition', $competition_id);
		$this -> db -> where('id_user', $user_id);
		$query = $this -> db -> get($this -> table);
		if($query->num_rows()==0){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

}
?>