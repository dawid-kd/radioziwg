<div class="navbar navbar-fixed-top">
 	   <div class="navbar-inner">
    	   <div class="container">
            <ul class="nav pull-left">
                <li><a href="<?php echo render_url('',''); ?>"><i class="icon-home icon-white"></i>Strona główna</a></li>
                <li><a href="<?php echo render_url('users/show_toplist',''); ?>"><i class="icon-music icon-white"></i>Lista przebojów</a></li>
                <li><a href="<?php echo render_url('admin/show_all_votes',''); ?>"><i class="icon-eye-open icon-white"></i>Głosowania</a></li>	
                <li><a href="<?php echo render_url('admin/show_all_surveys',''); ?>"><i class="icon-user icon-white"></i>Ankiety</a></li>
                <li><a href="<?php echo render_url('admin/show_all_compet',''); ?>"><i class="icon-gift icon-white"></i>Konkursy</a></li>
<!--                <li><a href="weather.html"><i class="icon-cog icon-white"></i>Pogoda</a></li>-->
            </ul>
		<ul class="nav pull-right">
		<li class="dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock icon-white"></i>Panel administratora<b class="caret"></b></a>
    			<ul class="dropdown-menu">
                            <li><a href="<?php echo render_url('admin/albums_showAll',''); ?>">Albumy</a></li>
                            <li><a href="<?php echo render_url('admin/artists_showAll',''); ?>">Artyści</a></li>
                            <li><a href="<?php echo render_url('admin/radio_showAll',''); ?>">Radia</a></li>
                            <li><a href="<?php echo render_url('admin/songs_showAll',''); ?>">Utwory</a></li>
                            <li><a href="<?php echo render_url('admin/show_all_surveys',''); ?>">Ankiety</a></li>
                            <li><a href="<?php echo render_url('admin/show_all_compet',''); ?>">Konkursy</a></li>
                            <li><a href="<?php echo render_url('admin/show_all_votes',''); ?>">Głosowania</a></li>
                            <li><a href="<?php echo render_url('admin/users_showAll',''); ?>">Użytkownicy</a></li>
    			</ul>
		</li>
	    </ul>		  
          </div><!--/.nav-collapse -->
        </div>
      </div>