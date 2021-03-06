<?php

class Admin extends CI_Controller
{
    private $aMenu;
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Usersmodel');
        $this->load->model('Musicmodel');
		$this->load->model('Competition_model');///
		$this->load->model('Answer_model');///
		$this->load->model('Vote_model');///
		$this->load->model('Song_vote_model');///
		$this->load->model('Survey_model');///
		$this->load->model('Options_model');///
        
        # Left menu
        $this->aMenu = array(
            'Users'         => 'admin/users_showAll',
            'Albums'        => 'admin/albums_showAll',
            'Songs'         => 'admin/songs_showAll',
            'Artists'       => 'admin/artists_showAll',
            'Radio'         => 'admin/radio_showAll',
            'Competitions'	=> 'admin/show_all_compet',///
            'Vote'			=> 'admin/show_all_votes',///
            'Survey'		=> 'admin/show_all_surveys',///
            
        );
    }
    
    public function index()
    {
        $data['mainContent'] = 'admin/index';
        $data['viewContent'] = 'admin/welcome';
        
        $data['aMenu'] = $this->aMenu;
        
        $this->load->view('wrapper', $data);
    }
    
    /*
     *  USERS MANAGEMENT
     */
    public function users_showAll()
    {
        
        $data['content']    = 'userslist';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        
        # get all register users
        $data['aUsers'] = $this->Usersmodel->getAll();
        
        $this->load->view('wrapper', $data);
        
    }
    
    public function users_edit($iId)
    {
        # redirect to base location if ID < 0
        if (!$iId || $iId < 0) {
            redirect(render_url('admin/users_showAll',''));
        }
        
        $data['content']    = 'edituser';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['sMsg'] = false;
        
        # get user by id. if false -> redirect to base location
        if (! $data['aUser'] = $this->Usersmodel->getOne($iId)) {
            redirect(render_url('admin/users_showAll',''));
        }
        
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => 'user_name',
                    'label' => 'First name',
                    'rules' => 'trim|xss_clean|required'
                ),
                array(
                    'field' => 'user_surname',
                    'label' => 'Surname',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'login',
                    'label' => 'Login',
                    'rules' => 'trim|xss_clean|required'
                ),array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|xss_clean|required'
                ),array(
                    'field' => 'email1',
                    'label' => 'E-mail',
                    'rules' => 'trim|xss_clean|required'
                ),array(
                    'field' => 'email2',
                    'label' => 'E-mail 2',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'street',
                    'label' => 'Street',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'post_code',
                    'label' => 'Postcode',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'city',
                    'label' => 'City',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'phone_number',
                    'label' => 'Phone',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'user_type',
                    'label' => 'user_type',
                    'rules' => 'trim|xss_clean|required'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all data from form fields
                $aData = array();
                foreach ($data['aUser'] as $key => $val) {
                    $aData[$key] = $this->input->post($key);
                }
                # update user data
                $this->Usersmodel->setData($aData);
                $data['aUser'] = $this->Usersmodel->getOne($iId);
                $data['sMsg'] = 'Changes saved';
            }
        }
        
        $this->load->view('wrapper', $data);
        
    }
    
    public function users_delete()
    {
        $data['content']    = 'deleteuser';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['aMenu'] = $this->aMenu;
        
        if ($this->input->post('id')) {
            $iId = $this->input->post('id');
            $this->Usersmodel->deleteUser($iId);
            $data['sMsg'] = '<p class="text-success">User deleted</p>';
            
        } else {
            $data['sMsg'] = '<p class="text-error">Error</p>';
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function users_add()
    {
        
        $data['content']    = 'adduser';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['sMsg'] = false;
        
       
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => 'user_name',
                    'label' => 'First name',
                    'rules' => 'trim|xss_clean|required'
                ),
                array(
                    'field' => 'user_surname',
                    'label' => 'Surname',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'login',
                    'label' => 'Login',
                    'rules' => 'trim|xss_clean|required'
                ),array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|xss_clean|required'
                ),array(
                    'field' => 'email1',
                    'label' => 'E-mail',
                    'rules' => 'trim|xss_clean|required'
                ),array(
                    'field' => 'email2',
                    'label' => 'E-mail 2',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'street',
                    'label' => 'Street',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'post_code',
                    'label' => 'Postcode',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'city',
                    'label' => 'City',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'phone_number',
                    'label' => 'Phone',
                    'rules' => 'trim|xss_clean'
                ),array(
                    'field' => 'user_type',
                    'label' => 'user_type',
                    'rules' => 'trim|xss_clean|required'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all data from form fields
                $aCols = $this->Musicmodel->getColumns('user');
                $aData = array();
                foreach ($aCols as $sCol) {
                    $aData[$sCol] = $this->input->post($sCol);
                }
                # update user data
                $this->Usersmodel->setData($aData);
                redirect(render_url('admin/users_showAll',''));
            }
        }
        
        $this->load->view('wrapper', $data);
        
    }
    
    public function albums_showAll()
    {
        # get all register users
        $data['aList'] = $this->Musicmodel->getAll('album');
        
        $data['content']    = 'albumlist';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        
        $this->load->view('wrapper', $data);
        
    }
    
    public function albums_edit($iId)
    {
        # redirect to base location if ID < 0
        if (!$iId || $iId < 0) {
            redirect(render_url('admin/albums_showAll',''));
        }
        
        $data['content']    = 'editalbum';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        
        $data['sMsg'] = false;
        
        # get record by id. if false -> redirect to base location
        if (! $data['aOne'] = $this->Musicmodel->getOne('album',$iId)) {
            redirect(render_url('admin/albums_showAll',''));
        }
        
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => 'album_name',
                    'label' => 'album_name',
                    'rules' => 'trim|xss_clean|required'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all data from form fields
                $aData = array();
                foreach ($data['aOne'] as $key => $val) {
                    $aData[$key] = $this->input->post($key);
                }
                # update user data
                $this->Musicmodel->setData('album',$aData);
                
                $data['sMsg'] = 'Changes saved';
            }
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function albums_delete()
    {
        $data['content']    = 'deletealbum';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        
        if ($this->input->post('id')) {
            $iId = $this->input->post('id');
            $this->Musicmodel->deleteOne('album',$iId);
            $data['sMsg'] = '<p class="text-success">Album deleted</p>';
            
        } else {
            $data['sMsg'] = '<p class="text-error">Error</p>';
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function albums_add()
    {
        $data['content']    = 'addalbum';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['sMsg'] = false;
        
                
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => 'album_name',
                    'label' => 'album_name',
                    'rules' => 'trim|xss_clean|required'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all columns name from table
                $aCols = $this->Musicmodel->getColumns('album');
                
                # get all data from form fields
                $aData = array();
                foreach ($aCols as $sCol) {
                    $aData[$sCol] = $this->input->post($sCol);
                }
                # update user data
                $this->Musicmodel->setData('album',$aData);
                
                redirect(render_url('admin/albums_showAll',''));
            }
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function songs_showAll()
    {
        
        $data['content']    = 'songlist';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['aMenu'] = $this->aMenu;
        
        # get all register songs
        $data['aList'] = $this->Musicmodel->songs_getAll();
        
        $this->load->view('wrapper', $data);
        
    }
    
    public function songs_edit($iId)
    {
        # redirect to base location if ID < 0
        if (!$iId || $iId < 0) {
            redirect(render_url('admin/songs_showAll',''));
        }
        
        $data['content']    = 'editsong';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        
        $data['aMenu'] = $this->aMenu;
        $data['sMsg'] = false;
        
        # get record by id. if false -> redirect to base location
        if (! $data['aOne'] = $this->Musicmodel->songs_getOne($iId)) {
            redirect(render_url('admin/songs_showAll',''));
        }
        
        $data['aAlbums'] = $this->Musicmodel->getAll('album');
        $data['aArtists'] = $this->Musicmodel->getAll('artist');
        $data['aGenres'] = $this->Musicmodel->getAll('music_genre');
        
        
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => 'song_name',
                    'label' => 'song_name',
                    'rules' => 'trim|xss_clean|required'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all columns name from table
                $aCols = $this->Musicmodel->getColumns('song');
                
                # get all data from form fields
                $aData = array();
                foreach ($aCols as $sCol) {
                    $aData[$sCol] = $this->input->post($sCol);
                }
                # update data
                $this->Musicmodel->songs_setData($aData,$this->input->post('aGenreIds'));
                
                # get updated record
                $data['aOne'] = $this->Musicmodel->songs_getOne($iId);
                $data['sMsg'] = 'Changes saved';
            }
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function songs_delete()
    {
        $data['content']    = 'deletesong';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['aMenu'] = $this->aMenu;
        
        if ($this->input->post('id')) {
            $iId = $this->input->post('id');
            $this->Musicmodel->songs_deleteOne($iId);
            $data['sMsg'] = '<p class="text-success">Record deleted</p>';
            
        } else {
            $data['sMsg'] = '<p class="text-error">Error</p>';
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function songs_add()
    {
        $data['content']    = 'addsong';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['aMenu'] = $this->aMenu;
        $data['sMsg'] = false;
        
        $data['aAlbums'] = $this->Musicmodel->getAll('album');
        $data['aArtists'] = $this->Musicmodel->getAll('artist');
        $data['aGenres'] = $this->Musicmodel->getAll('music_genre');
        
        
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => 'song_name',
                    'label' => 'song_name',
                    'rules' => 'trim|xss_clean|required'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all columns name from table
                $aCols = $this->Musicmodel->getColumns('song');
                
                # get all data from form fields
                $aData = array();
                foreach ($aCols as $sCol) {
                    $aData[$sCol] = $this->input->post($sCol);
                }
                # update data
                $this->Musicmodel->songs_setData($aData,$this->input->post('aGenreIds'));
                
                # get updated record
                redirect(render_url('admin/songs_showAll',''));
            }
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function artists_showAll()
    {
        
        $data['content']    = 'artistlist';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['aMenu'] = $this->aMenu;
        
        # get all register songs
        $data['aList'] = $this->Musicmodel->getAll('artist');
        
        $this->load->view('wrapper', $data);
        
    }
    
    public function artists_edit($iId)
    {
        # redirect to base location if ID < 0
        if (!$iId || $iId < 0) {
            redirect(render_url('admin/artists_showAll',''));
        }
        
        $data['content']    = 'editartist';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['aMenu'] = $this->aMenu;
        $data['sMsg'] = false;
        
        # get record by id. if false -> redirect to base location
        if (! $data['aOne'] = $this->Musicmodel->getOne('artist',$iId)) {
            redirect(render_url('admin/artists_showAll',''));
        }
        
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => 'artist_name',
                    'label' => 'artist_name',
                    'rules' => 'trim|xss_clean|required'
                ),
                array(
                    'field' => 'artist_surname',
                    'label' => 'artist_surname',
                    'rules' => 'trim|xss_clean'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all columns name from table
                $aCols = $this->Musicmodel->getColumns('artist');
                
                # get all data from form fields
                $aData = array();
                foreach ($aCols as $sCol) {
                    $aData[$sCol] = $this->input->post($sCol);
                }
                # update user data
                $this->Musicmodel->setData('artist',$aData);
                
                # get updated record
                $data['aOne'] = $this->Musicmodel->getOne('artist',$iId);
                $data['sMsg'] = 'Changes saved';
            }
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function artists_delete()
    {
        $data['content']    = 'deleteartist';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['aMenu'] = $this->aMenu;
        
        if ($this->input->post('id')) {
            $iId = $this->input->post('id');
            $this->Musicmodel->deleteOne('artist',$iId);
            $data['sMsg'] = '<p class="text-success">Record deleted</p>';
            
        } else {
            $data['sMsg'] = '<p class="text-error">Error</p>';
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function artists_add()
    {
        $data['content']    = 'addartist';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        $data['aMenu'] = $this->aMenu;
        $data['sMsg'] = false;
        
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => 'artist_name',
                    'label' => 'artist_name',
                    'rules' => 'trim|xss_clean|required'
                ),
                array(
                    'field' => 'artist_surname',
                    'label' => 'artist_surname',
                    'rules' => 'trim|xss_clean'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all columns name from table
                $aCols = $this->Musicmodel->getColumns('artist');
                
                # get all data from form fields
                $aData = array();
                foreach ($aCols as $sCol) {
                    $aData[$sCol] = $this->input->post($sCol);
                }
                # update user data
                $this->Musicmodel->setData('artist',$aData);
                
                redirect(render_url('admin/artists_showAll',''));
            }
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function radio_showAll()
    {
        $data['sModuleName'] = 'radio';
        $data['content']    = 'radiolist';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        
        $data['aMenu'] = $this->aMenu;
        
        # get all register songs
        $data['aList'] = $this->Musicmodel->radio_getAll($data['sModuleName']);
        
        $this->load->view('wrapper', $data);
        
    }
    
    public function radio_edit($iId)
    {
        # redirect to base location if ID < 0
        if (!$iId || $iId < 0) {
            redirect(render_url('admin/radio_showAll',''));
        }
        
        $data['sModuleName'] = 'radio';
        $data['content']    = 'editradio';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        
        $data['aMenu'] = $this->aMenu;
        $data['sMsg'] = false;
        
        # get record by id. if false -> redirect to base location
        if (! $data['aOne'] = $this->Musicmodel->radio_getOne($iId)) {
            redirect(render_url('admin/'.$data['sModuleName'].'_showAll',''));
        }
        
        $data['aGenres'] = $this->Musicmodel->getAll('music_genre');
        
        
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => $data['sModuleName'].'_name',
                    'label' => $data['sModuleName'].'_name',
                    'rules' => 'trim|xss_clean|required'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all columns name from table
                $aCols = $this->Musicmodel->getColumns($data['sModuleName']);
                
                # get all data from form fields
                $aData = array();
                foreach ($aCols as $sCol) {
                    $aData[$sCol] = $this->input->post($sCol);
                }
                # update data
                $this->Musicmodel->radio_setData($aData,$this->input->post('aGenreIds'));
                
                # get updated record
                $data['aOne'] = $this->Musicmodel->radio_getOne($iId);
                $data['sMsg'] = 'Changes saved';
            }
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function radio_delete()
    {
        $data['sModuleName'] = 'radio';
        $data['content']    = 'deleteradio';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        
        $data['aMenu'] = $this->aMenu;
        
        if ($this->input->post('id')) {
            $iId = $this->input->post('id');
            $this->Musicmodel->radio_deleteOne($iId);
            $data['sMsg'] = '<p class="text-success">Record deleted</p>';
            
        } else {
            $data['sMsg'] = '<p class="text-error">Error</p>';
        }
        
        $this->load->view('wrapper', $data);
    }
    
    public function radio_add()
    {
        $data['sModuleName'] = 'radio';
        $data['content']    = 'addradio';
        $data['radio']      = isset($_GET['radio'])?$_GET['radio']:'none';
        
        $data['aMenu'] = $this->aMenu;
        $data['sMsg'] = false;
        
        $data['aGenres'] = $this->Musicmodel->getAll('music_genre');
        
        
        # If form is submitted
        if ($this->input->post('bProceed')) {
            # set rules for form validation class
            $aFormConfig = array(
                array(
                    'field' => $data['sModuleName'].'_name',
                    'label' => $data['sModuleName'].'_name',
                    'rules' => 'trim|xss_clean|required'
                )
            );

            $this->form_validation->set_rules($aFormConfig);
            
            if ($this->form_validation->run()) {
                # get all columns name from table
                $aCols = $this->Musicmodel->getColumns($data['sModuleName']);
                
                # get all data from form fields
                $aData = array();
                foreach ($aCols as $sCol) {
                    $aData[$sCol] = $this->input->post($sCol);
                }
                # update data
                $this->Musicmodel->radio_setData($aData,$this->input->post('aGenreIds'));
                
                # get updated record
                redirect(render_url('admin/'.$data['sModuleName'].'_showAll',''));
            }
        }
        
        $this->load->view('wrapper', $data);
    }
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function compet_answers($competition_id) {
		$data['Competition'] = $this -> Competition_model -> getOneCompetition($competition_id);
		$result = $this -> Answer_model -> getAnswers($competition_id);
		$answers = array();
		foreach ($result as $key) {
			$user = $this -> Usersmodel -> getOne($key['id_user']);
			$answers[] = array('id' => $key['id'], 'answer' => $key['answer'], 'user' => $user['login'], 'user_id' => $user['id']);
		}
		shuffle($answers);
		$data['Answers'] = $answers;
		$data['content'] = 'competitionfromlistdetails';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$this -> session -> set_flashdata('id_compet', $competition_id);
		$winners = array();
		////////////////////////////////////////////////////////////////
		if ($this -> input -> post('bProceed')) {
			$users = $this -> Usersmodel -> getAll();
			foreach ($users as $key) {
				if ($this -> input -> post('user' . $key['id']) == 1) {
					$winners[] = $key;
				}
			}//spr czy sa zwyc
			$data['content'] = 'competitionwinners';
			$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
			$data['Winners'] = $winners;
			//w nast post
			//$this->load->library('email');
		}
		if ($this -> input -> post('cProceed')) {
			$this -> load -> library('email');
			foreach ($winners as $key) {
				$this -> send_mail_to_winner($key['email1'], $data['Competition']['question'], $data['Competition']['competition_name']);
			}
			//redirect(base_url() . 'admin/show_all_compet');
		}
		///////////////////////////////////////////////////////////////
		$this -> load -> view('wrapper', $data);
	}

	public function send_mail_to_winner($mail, $question, $competition_name) {
		print_r($mail);/*
		$this -> email -> from('konkurs@radioziwg.pl', 'Radioziwg');
		$this -> email -> to('pawelbilinski00@gmail.com');
		$this -> email -> subject('Konkurs Radioziwg');
		$this -> email -> message('Gratulacje! Opowiadając poprawnie na pytanie: ' . $question . ' zdobyłeś/zdobyłaś jedną z nagród w konkursie ' . $competition_name . '.');
		$this -> email -> send();*/
	}

	public function answer_delete($id) {
		$this -> Answer_model -> delAnswer($id);
		redirect(base_url() . 'admin/compet_answers/' . $this -> session -> flashdata('id_compet'));
	}

	public function show_active_compet() {
		$data['ACompetitions'] = $this -> Competition_model -> getActiveCompetition();
		$data['content'] = 'competitionlist';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$this -> load -> view('wrapper', $data);
	}

	public function show_all_compet() {
		$data['Competitions'] = $this -> Competition_model -> getAllCompetitions();
		$data['content'] = 'competitionlistall';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$this -> load -> view('wrapper', $data);
	}

	public function compet_edit($id) {
		$data['content'] = 'editcompetition';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$data['Competition'] = $this -> Competition_model -> getOneCompetition($id);
		$data['sMsg'] = false;
		if ($this -> input -> post('bProceed')) {
			$aFormConfig = array( array('field' => 'competition_name', 'label' => 'Nazwa konkursu', 'rules' => 'trim|xss_clean|required'), array('field' => 'description', 'label' => 'Opis', 'rules' => 'trim|xss_clean'), array('field' => 'start_date', 'label' => 'Początek konkursu', 'rules' => 'trim|xss_clean'), array('field' => 'end_date', 'label' => 'Koniec konkursu', 'rules' => 'trim|xss_clean'), array('field' => 'question', 'label' => 'Pytanie konkursowe', 'rules' => 'trim|xss_clean|required'));
			$this -> form_validation -> set_rules($aFormConfig);
			if ($this -> form_validation -> run()) {
				$tmp;
				if ($this -> input -> post('current') != "T") {$tmp = "N";
				} else {$tmp = "T";
				};
				$aData = array('competition_name' => $this -> input -> post('competition_name'), 'description' => $this -> input -> post('description'), 'start_date' => $this -> input -> post('start_date'), 'end_date' => $this -> input -> post('end_date'), 'question' => $this -> input -> post('question'), 'current' => $tmp, );
				$this -> Competition_model -> setCompetition($id, $aData);
				redirect(base_url() . 'admin/show_all_compet');
			}
		}
		$this -> load -> view('wrapper', $data);
	}

	public function compet_delete($id) {
		$this -> Competition_model -> delCompetition($id);
		redirect(base_url() . 'admin/show_all_compet');
	}

	public function compet_add() {
		$data['content'] = 'addcompetition';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		if ($this -> input -> post('bProceed')) {
			$aFormConfig = array( array('field' => 'competition_name', 'label' => 'Nazwa konkursu', 'rules' => 'trim|xss_clean|required'), array('field' => 'description', 'label' => 'Opis', 'rules' => 'trim|xss_clean'), array('field' => 'start_date', 'label' => 'Początek konkursu', 'rules' => 'trim|xss_clean'), array('field' => 'end_date', 'label' => 'Koniec konkursu', 'rules' => 'trim|xss_clean'), array('field' => 'question', 'label' => 'Pytanie konkursowe', 'rules' => 'trim|xss_clean|required'));
			$this -> form_validation -> set_rules($aFormConfig);
			if ($this -> form_validation -> run()) {
				$tmp;
				if ($this -> input -> post('current') != "T") {$tmp = "N";
				} else {$tmp = "T";
				};
				$aData = array('competition_name' => $this -> input -> post('competition_name'), 'description' => $this -> input -> post('description'), 'start_date' => $this -> input -> post('start_date'), 'end_date' => $this -> input -> post('end_date'), 'question' => $this -> input -> post('question'), 'current' => $tmp, );
				$this -> Competition_model -> addCompetition($aData);
				redirect(base_url() . 'admin/show_all_compet');
			}
		}
		$this -> load -> view('wrapper', $data);
	}

	public function show_all_votes() {
		$data['Votes'] = $this -> Vote_model -> getVotes();
		$data['content'] = 'voteslist';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$this -> load -> view('wrapper', $data);
	}

	public function show_vote_songs($id) {
		$data['content'] = 'votesongslist';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$data['Vote'] = $this -> Vote_model -> getVote($id);
		$data['Songs'] = $this -> Song_vote_model -> getSongs($id);

		$data['SongsNames'] = $this -> Musicmodel -> getIdAndSongsNames('song');
		$this -> session -> set_flashdata('id_vote', $id);
		if (isset($_POST['songs']))//dodawanie utworów do głosowania
		{
			$dane = array('id_vote' => $id, 'id_song' => $this -> input -> post('songs'), 'votes_count' => 0, );
			$this -> Song_vote_model -> addCounter($dane);
			redirect(base_url() . 'admin/show_vote_songs/' . $this -> session -> flashdata('id_vote'));
		}
		$this -> load -> view('wrapper', $data);
	}

	public function vote_song_delete($song_id) {
		$this -> Song_vote_model -> delCounter($song_id);
		redirect(base_url() . 'admin/show_vote_songs/' . $this -> session -> flashdata('id_vote'));
	}

	public function vote_add() {
		$data['content'] = 'addvote';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		if ($this -> input -> post('bProceed')) {
			$aFormConfig = array( array('field' => 'vote_name', 'label' => 'Nazwa głosowania', 'rules' => 'trim|xss_clean|required'), array('field' => 'description', 'label' => 'Opis', 'rules' => 'trim|xss_clean'));
			$this -> form_validation -> set_rules($aFormConfig);
			if ($this -> form_validation -> run()) {
				$aData = array('vote_name' => $this -> input -> post('vote_name'), 'description' => $this -> input -> post('description'), );
			}
			$this -> Vote_model -> addVote($aData);
			redirect(base_url() . 'admin/show_all_votes');

		}
		$this -> load -> view('wrapper', $data);
	}

	public function vote_edit($id) {
		$data['content'] = 'editvote';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$data['aMenu'] = $this -> aMenu;
		$data['sMsg'] = false;
		$data['Vote'] = $this -> Vote_model -> getVote($id);
		if ($this -> input -> post('bProceed')) {
			$aFormConfig = array( array('field' => 'vote_name', 'label' => 'Nazwa głosowania', 'rules' => 'trim|xss_clean|required'), array('field' => 'description', 'label' => 'Opis', 'rules' => 'trim|xss_clean'));
			$this -> form_validation -> set_rules($aFormConfig);
			if ($this -> form_validation -> run()) {
				$aData = array();
				foreach ($data['Vote'] as $Key => $val) {
					$aData[$Key] = $this -> input -> post($Key);
				}
				$this -> Vote_model -> setVote($id, $aData);
				redirect(base_url() . 'admin/show_all_votes');
			}
		}
		$this -> load -> view('wrapper', $data);
	}

	public function vote_delete($id) {
		$this -> Vote_model -> delVote($id);
		redirect(base_url() . 'admin/show_all_votes');
	}

	public function show_all_surveys() {
		$data['Surveys'] = $this -> Survey_model -> getSurveys();
		$data['content'] = 'surveyslist';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$this -> load -> view('wrapper', $data);
	}

	public function survey_add() {
		$data['content'] = 'addsurvey';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		if ($this -> input -> post('bProceed')) {
			$aFormConfig = array( array('field' => 'survey_name', 'label' => 'Nazwa ankiety', 'rules' => 'trim|xss_clean|required'), array('field' => 'question', 'label' => 'Pytanie', 'rules' => 'trim|xss_clean|reuired'));
			$this -> form_validation -> set_rules($aFormConfig);
			if ($this -> form_validation -> run()) {
				$tmp;
				if ($this -> input -> post('current') != "T") {$tmp = "N";
				} else {$tmp = "T";
				};
				$aData = array('survey_name' => $this -> input -> post('survey_name'), 'question' => $this -> input -> post('question'), 'current' => $tmp, );
				$this -> Survey_model -> addSurvey($aData);
				redirect(base_url() . 'admin/show_all_surveys');
			}
		}
		$this -> load -> view('wrapper', $data);
	}

	public function survey_edit($id) {
		$data['content'] = 'editsurvey';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$data['sMsg'] = false;
		$data['Survey'] = $this -> Survey_model -> getSurvey($id);
		if ($this -> input -> post('bProceed')) {
			$aFormConfig = array( array('field' => 'survey_name', 'label' => 'Nazwa ankiety', 'rules' => 'trim|xss_clean|required'), array('field' => 'question', 'label' => 'Pytanie', 'rules' => 'trim|xss_clean|reuired'));
			$this -> form_validation -> set_rules($aFormConfig);
			if ($this -> form_validation -> run()) {
				$tmp;
				if ($this -> input -> post('current') != "T") {$tmp = "N";
				} else {$tmp = "T";
				};
				$aData = array('survey_name' => $this -> input -> post('survey_name'), 'question' => $this -> input -> post('question'), 'current' => $tmp, );
				$this -> Survey_model -> setSurvey($id, $aData);
				redirect(base_url() . 'admin/show_all_surveys');
			}
		}
		$this -> load -> view('wrapper', $data);
	}

	public function survey_delete($id) {
		$this -> Survey_model -> delSurvey($id);
		redirect(base_url() . 'admin/show_all_surveys');
	}

	public function show_survey_options($id) {
		$data['content'] = 'surveylistdetails';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$data['Survey'] = $this -> Survey_model -> getSurvey($id);
		$data['Options'] = $this -> Options_model -> getOptions($id);
		$this -> session -> set_flashdata('id_survey', $id);
		if (isset($_POST['option_name'])) {
			$dane = array('id_survey' => $id, 'option_name' => $this -> input -> post('option_name'), 'option_count' => 0, );
			$this -> Options_model -> addOptions($dane);
			redirect(base_url() . 'admin/show_survey_options/' . $this -> session -> flashdata('id_survey'));
		}
		$this -> load -> view('wrapper', $data);
	}

	public function survey_option_delete($id) {
		$this -> Options_model -> delOptions($id);
		redirect(base_url() . 'admin/show_survey_options/' . $this -> session -> flashdata('id_survey'));
	}

	public function survey_option_edit($id) {
		$data['content'] = 'editoption';
		$data['radio'] = isset($_GET['radio']) ? $_GET['radio'] : 'none';
		$data['sMsg'] = false;
		$data['Survey'] = $this -> session -> flashdata('id_survey');
		$data['Option'] = $this -> Options_model -> getOption($id);
		if ($this -> input -> post('bProceed')) {
			$aFormConfig = array( array('field' => 'option_name', 'label' => 'Nazwa opcji', 'rules' => 'trim|xss_clean|required'));
			$this -> form_validation -> set_rules($aFormConfig);
			if ($this -> form_validation -> run()) {
				$aData = array('option_name' => $this -> input -> post('option_name'), );
				$this -> Options_model -> setOptions($id, $aData);
				redirect(base_url() . 'admin/show_survey_options/' . $this -> input -> post('id_survey'));
			}
		}
		$this -> load -> view('wrapper', $data);

	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
}

?>
