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
    
    public function songs_setData($aData,$iaGenreIds)
    {
        $id = isset($aData['id']) ? $aData['id'] : 0;

        if ($id > 0)
        {
            $this->db->where('id', $id);
            $this->db->update('song', $aData);
            
            $this->db->flush_cache();
            
            # delete old song genre
            $this->db->where('id_song',$id);
            $this->db->delete('song_genre');
            
            $this->db->flush_cache();
            
            # insert song genre record
            foreach ($iaGenreIds as $iIdGenre) {
                $aDataGenre = array();
                $aDataGenre['id_genre'] = $iIdGenre;
                $aDataGenre['id_song'] = $id;
                $this->db->insert('song_genre',$aDataGenre);
            }
        }
        else
        {
            $this->db->insert('song', $aData);
            $id = $this->db->insert_id();
            
            $this->db->flush_cache();
            
            # insert song genre record
            foreach ($iaGenreIds as $iIdGenre) {
                $aDataGenre = array();
                $aDataGenre['id_genre'] = $iIdGenre;
                $aDataGenre['id_song'] = $id;
                $this->db->insert('song_genre',$aDataGenre);
            }
            
        }

        return $id;
    }
    
    public function songs_deleteOne($iId)
    {
        $sModuleName = 'song';
        
        $this->db->where('id',$iId);
        if ($this->db->delete($sModuleName)) {
            
            $this->db->flush_cache();
            # delete all genre records
            $this->db->where('id_'.$sModuleName,$iId);
            $this->db->delete($sModuleName.'_genre');
            
            return true;
        }
        return false;
    }
    
    public function radio_getAll()
    {
        $sModuleName = 'radio';
        
        $query = $this->db->get($sModuleName);
        $aList = $query->result_array();
        
        $this->db->flush_cache();
        
        foreach ($aList as $key => $val) {
            $this->db->select('name_genre');
            $this->db->where('radio_genre.id_radio', $val['id']);
            $this->db->from('radio_genre');
            $this->db->join('radio', 'radio.id = radio_genre.id_radio');
            $this->db->join('music_genre', 'music_genre.id = radio_genre.id_genre');
            $query2 = $this->db->get();
            $aGenre = $query2->result_array();
            
            $aList[$key]['aGenre'] = array();
            foreach ($aGenre as $aOneGenre) {
                $aList[$key]['aGenre'][] = $aOneGenre;
            }
        }
        
        return $aList;
    }
    
    public function radio_getOne($iId)
    {
        $sModuleName = 'radio';
        
        $this->db->select();
        $this->db->from($sModuleName);
        $this->db->where($sModuleName.'.id',$iId);
        
        $query = $this->db->get();
        $aList = $query->row_array();
        
        $this->db->flush_cache();
        
        $this->db->select('name_genre');
        $this->db->where('radio_genre.id_radio', $iId);
        $this->db->from('radio_genre');
        $this->db->join('radio', 'radio.id = radio_genre.id_radio');
        $this->db->join('music_genre', 'music_genre.id = radio_genre.id_genre');
        $query2 = $this->db->get();
        $aGenre = $query2->result_array();

        $aList['aGenre'] = array();
        foreach ($aGenre as $aOneGenre) {
            $aList['aGenre'][] = $aOneGenre['name_genre'];
        }
        
        return $aList;
    }
    
    public function radio_setData($aData,$iaGenreIds)
    {
        $sModuleName = 'radio';
        $id = isset($aData['id']) ? $aData['id'] : 0;

        if ($id > 0)
        {
            $this->db->where('id', $id);
            $this->db->update($sModuleName, $aData);
            
            $this->db->flush_cache();
            
            # delete old song genre
            $this->db->where('id_'.$sModuleName,$id);
            $this->db->delete($sModuleName.'_genre');
            
            $this->db->flush_cache();
            
            # insert song genre records
            foreach ($iaGenreIds as $iIdGenre) {
                $aDataGenre = array();
                $aDataGenre['id_genre'] = $iIdGenre;
                $aDataGenre['id_'.$sModuleName] = $id;
                $this->db->insert($sModuleName.'_genre',$aDataGenre);
            }
        }
        else
        {
            $this->db->insert($sModuleName, $aData);
            $id = $this->db->insert_id();
            
            $this->db->flush_cache();
            
            # insert song genre record
            foreach ($iaGenreIds as $iIdGenre) {
                $aDataGenre = array();
                $aDataGenre['id_genre'] = $iIdGenre;
                $aDataGenre['id_'.$sModuleName] = $id;
                $this->db->insert($sModuleName.'_genre',$aDataGenre);
            }
            
        }

        return $id;
    }
    
    public function radio_deleteOne($iId)
    {
        $sModuleName = 'radio';
        
        $this->db->where('id',$iId);
        if ($this->db->delete($sModuleName)) {
            
            $this->db->flush_cache();
            # delete all genre records
            $this->db->where('id_'.$sModuleName,$iId);
            $this->db->delete($sModuleName.'_genre');
            
            return true;
        }
        return false;
    }
}
?>
