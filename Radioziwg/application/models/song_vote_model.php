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

	public function getSongs($id, $sort = false) {//pioseki w ramach danego glosowania
		$this->db->where('id_vote', $id);
                
                if ($sort) {
                    $this->db->order_by($sort, 'desc');
                }
		$query = $this -> db -> get($this -> table);
		return $query -> result_array();
	}
        
        public function getTopList($iVoteId = false)
        {
            $this->db->select('id_song');
            $this->db->select_sum('votes_count');
            $this->db->select('song.song_name');
            $this->db->select('song.id_artist');
            $this->db->select('artist.artist_name');
            $this->db->select('album.album_name');
            //$this->db->where('id_vote', $iVoteId);
            $this->db->join('song', 'song.id = '.$this -> table.'.id_song');
            $this->db->join('artist', 'artist.id = song.id_artist');
            $this->db->join('album', 'album.id = song.id_album');
            $this->db->group_by("id_song"); 
            $this->db->order_by('votes_count', 'desc');
            
            $query = $this -> db -> get($this -> table);
            return $query -> result_array();
        }

}
?>