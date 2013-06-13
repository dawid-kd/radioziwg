<?php
class User_option extends CI_Model
{
    private $table = 'users_option';
    
    public function __construct()
    {
        parent::__construct();
    }
	
	public function addUOption($data) {
		$this -> db -> insert($this -> table, $data);
	}

	public function delUOption($id) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($this -> table);
	}
	
	public function getUOption($user_id, $survey_id){
		$this -> db -> where('id_survey', $survey_id);
		$this -> db -> where('id_user', $user_id);
		return $query = $this -> db -> get($this -> table)->row_array();
	}
    
    public function checkUOption($user_id, $survey_id){
		$this -> db -> where('id_survey', $survey_id);
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




