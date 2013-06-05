<?php

header('Content-Type: text/html; charset=utf-8');
        /*tutaj pasek nawigacyjny musi być ładowany czy jest ktoś zalogowany czy też czy jest to użytkownik czy admin*/
        $this->load->view('header');

        //$this->load->view('navigation/foradmin');
        if ($this->session->userdata('id') != FALSE) {
            if ($this->session->userdata('isAdmin') != FALSE) {
                $this->load->view('navigation/foradmin');
            }else{
                $this->load->view('navigation/forusers');
            }
        } else{
            $this->load->view('navigation/foreveryone');
        }
        //$this->load->view('navigation/foreveryone');


       $this->load->view('radios/radios');

                /* tutaj musi być ładowane radio w zależności od kliknięcia na grafikę radia */

       if($radio=='classic'){
         $this->load->view('radios/classicradio');  
       }elseif($radio=='rock'){
           $this->load->view('radios/rockradio');
       }elseif($radio=='metal'){
          $this->load->view('radios/metalradio'); 
       }else{
           $this->load->view('radios/metalradio'); 
       }
       
        if ($this->session->userdata('id') !== FALSE) {
            $this->load->view('login/logout');
        } else {
            $this->load->view('login/login');
        }

        $this->load->view('content/'.$content);

        $this->load->view('footer');
?>
