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
        
    }
    
    public function updateUserVote($dane, $id)
    {
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