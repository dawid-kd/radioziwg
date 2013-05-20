<?php

header('Content-Type: text/html; charset=utf-8');
        /*tutaj pasek nawigacyjny musi być ładowany czy jest ktoś zalogowany czy też czy jest to użytkownik czy admin*/
        $this->load->view('header');
        //$this->load->view('navigation/foradmin');
        $this->load->view('navigation/forusers');
        //$this->load->view('navigation/foreveryone');

       
       $this->load->view('radios/radios');
        
		/* tutaj musi być ładowane radio w zależności od kliknięcia na grafikę radia */

        $this->load->view('radios/classicradio');
       // $this->load->view('radios/rockradio');
       // $this->load->view('radios/metalradio');
        $this->load->view('login/login');
        $this->load->view('content/mainpage');
       // $this->load->view('body');
                
        $this->load->view('footer');
?>
