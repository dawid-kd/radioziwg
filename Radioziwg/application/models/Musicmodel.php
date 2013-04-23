<?php

class Musicmodel extends CI_Model
{
    
    public function getAll($sTableName)
    {
        $query = $this->db->get($sTableName);
        
        return $query->result_array();
    }
    
    public function getOne($sTableName,$iId)
    {
        $this->db->from($sTableName);
        $this->db->where('id', $iId);    
        $query = $this->db->get();
        
        if ($query->num_rows > 0) {
            return $query->row_array();
        }
        return false;
    }
    
    public function deleteOne($sTableName,$iId)
    {
        $this->db->where('id',$iId);
        if ($this->db->delete($sTableName)) {
            return true;
        }
        return false;
         
    }
    
    public function setData($sTableName, $aData)
    {
        $id = isset($aData['id']) ? $aData['id'] : 0;

        if ($id > 0)
        {
            $this->db->where('id', $id);
            $this->db->update($sTableName, $aData);
        }
        else
        {
            $this->db->insert($sTableName, $aData);
            $id = $this->db->insert_id();
        }

        return $id;
    }
    
}
?>
