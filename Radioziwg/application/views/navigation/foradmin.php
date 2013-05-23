<div class="navbar navbar-fixed-top">
 	   <div class="navbar-inner">
    	   <div class="container">
            <ul class="nav pull-left">
              <li><a href="index.html"><i class="icon-home icon-white"></i>Strona główna</a></li>
	          <li><a href="musiclist.html"><i class="icon-music icon-white"></i>Lista przebojów</a></li>
              <li><a href="votes.html"><i class="icon-eye-open icon-white"></i>Głosowania</a></li>	
	          <li><a href="surveys.html"><i class="icon-user icon-white"></i>Ankiety</a></li>
              <li><a href="competitions.html"><i class="icon-gift icon-white"></i>Konkursy</a></li>
              <li><a href="weather.html"><i class="icon-cog icon-white"></i>Pogoda</a></li>
            </ul>
		<ul class="nav pull-right">
		<li class="dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock icon-white"></i>Panel administratora<b class="caret"></b></a>
    			<ul class="dropdown-menu">
                            <li><a href="<?php echo render_url('admin/albums_showAll',''); ?>">Albumy</a></li>
                            <li><a href="<?php echo render_url('admin/artists_showAll',''); ?>">Artyści</a></li>
                            <li><a href="<?php echo render_url('admin/radio_showAll',''); ?>">Radia</a></li>
                            <li><a href="<?php echo render_url('admin/songs_showAll',''); ?>">Utwory</a></li>
                            <li><a href="#">Ankiety</a></li>
<<<<<<< HEAD
                            <li><a href="<?php echo render_url('admin/users_showAll',''); ?>">Użytkownicy</a></li>
=======
                            <li><a href="#">Użytkownicy</a></li>
>>>>>>> 7642b645fb405ac8fa53037a666ce94a8f781a66
                            <li><a href="#">Głosowania</a></li>
    			</ul>
		</li>
	    </ul>		  
          </div><!--/.nav-collapse -->
        </div>
      </div>