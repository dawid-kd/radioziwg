<?php

class Musicmodel extends CI_Model
{
    
    public function getColumns($sTableName)
    {
        return $fields = $this->db->list_fields($sTableName);
    }
    
    
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
    
    public function songs_getAll()
    {
        $this->db->select('song.*,album.album_name,artist.artist_name');
        $this->db->from('song');
        $this->db->join('album', 'album.id = song.id_album');
        $this->db->join('artist', 'artist.id = song.id_artist');
        
        $query = $this->db->get();
        $aList = $query->result_array();
        
        $this->db->flush_cache();
        
        foreach ($aList as $key => $val) {
            $this->db->select('name_genre');
            $this->db->where('song_genre.id_song', $val['id']);
            $this->db->from('song_genre');
            $this->db->join('song', 'song.id = song_genre.id_song');
            $this->db->join('music_genre', 'music_genre.id = song_genre.id_genre');
            $query2 = $this->db->get();
            $aGenre = $query2->result_array();
            
            $aList[$key]['aGenre'] = array();
            foreach ($aGenre as $aOneGenre) {
                $aList[$key]['aGenre'][] = $aOneGenre;
            }
        }
        
        return $aList;
    }
    
    public function songs_getOne($iId)
    {
        $this->db->select('song.*,album.album_name,artist.artist_name');
        $this->db->from('song');
        $this->db->where('song.id',$iId);
        $this->db->join('album', 'album.id = song.id_album');
        $this->db->join('artist', 'artist.id = song.id_artist');
        
        $query = $this->db->get();
        $aList = $query->row_array();
        
        $this->db->flush_cache();
        
        $this->db->select('name_genre');
        $this->db->where('song_genre.id_song', $aList['id']);
        $this->db->from('song_genre');
        $this->db->join('song', 'song.id = song_genre.id_song');
        $this->db->join('music_genre', 'music_genre.id = song_genre.id_genre');
        $query2 = $this->db->get();
        $aGenre = $query2->result_array();

        $aList['aGenre'] = array();
        foreach ($aGenre as $aOneGenre) {
            $aList['aGenre'][] = $aOneGenre['name_genre'];
        }
        
        return $aList;
    }
    
}
?>
