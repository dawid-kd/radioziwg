<?php
class Song_vote_model extends CI_Model {
	private $table = 'song_vote';

	public function __construct() {
		parent::__construct();
	}

	public function addCounter($data) {//dodaj piosenke do głosowania
		$this -> db -> insert($this -> table, $data);
	}

	public function delCounter($id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($this -> table);
	}

	public function increaseCounter($song_id) {//zwieksz ilosc glosow piosenki o 1
		$this -> db -> where('id', $song_id);
		$query = $this -> db -> get($this -> table) -> row_array();
		$query['votes_count']++;
		$this -> db -> where('id', $song_id);
		$this -> db -> update($this -> table, $query);
	}

	public function getSongCounter($song_id) {//ilosc glosow oddanych na piosenke
		$this -> db -> select('votes_count');
		$this -> db -> where('id', $song_id);
		$query = $this -> db -> get($this -> table) -> row_array();
		return $query['votes_count'];
	}

	public function getAddAllCounters($id) {//ilosc wszystkich glosow oddanych w danym glosowaniu

	}

	public function getSongs($id) {//pioseki w ramach danego glosowania
		$this->db->where('id_vote', $id);
		$query = $this -> db -> get($this -> table);
		return $query -> result_array();
	}

}
?>