<?php
class User_vote_model extends CI_Model
{
    private $table = 'users_vote';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function addUserVote($data)
    {
        $this -> db -> insert($this -> table, $data);
        
        # increase counter
        $this -> db -> where('id_song', $data['id_song']);
        $this -> db -> where('id_vote', $data['id_vote']);
        $query = $this -> db -> get('song_vote') -> row_array();
        $query['votes_count']++;
        $this -> db -> where('id', $query['id']);
        $this -> db -> update('song_vote', $query);
	
    }
    
    public function updateUserVote($dane, $id)
    {
        # get old record
        $this->db->where('id',$id);
        
        $queryGetOld = $this -> db -> get($this -> table);
        $aOldRecord = $queryGetOld -> row_array();
        
        # decrease old counter
        $this -> db -> where('id_song', $aOldRecord['id_song']);
        $this -> db -> where('id_vote', $aOldRecord['id_vote']);
        $query = $this -> db -> get('song_vote') -> row_array();
        $query['votes_count']--;
        $this -> db -> where('id', $query['id']);
        $this -> db -> update('song_vote', $query);
        
        # increase new counter
        $this -> db -> where('id_song', $dane['id_song']);
        $this -> db -> where('id_vote', $dane['id_vote']);
        $query2 = $this -> db -> get('song_vote') -> row_array();
        $query2['votes_count']++;
        $this -> db -> where('id', $query2['id']);
        $this -> db -> update('song_vote', $query2);
        
        
        $this -> db -> where('id', $id);
        $this -> db -> update($this->table, $dane);
    }
    
    public function delUserVote($id)
    {
        
    }
    
    public function getVotes($iVoteId = false)
    {
//        if ($iVoteId) {
//            $this->db->where('id_vote', )
//        }
        
        return false;
    }
    
    public function getUserVote($iVoteId, $iUserId)
    {
        $this->db->where('id_vote',$iVoteId);
        $this->db->where('id_user',$iUserId);
        
        $query = $this -> db -> get($this -> table);
        return $query -> row_array();
        
    }
}
?>