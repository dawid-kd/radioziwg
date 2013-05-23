<div class="navbar navbar-fixed-top">
 	   <div class="navbar-inner">
    	   <div class="container">
            <ul class="nav pull-left">
              <li><a href="index.html"><i class="icon-home icon-white"></i>Strona główna</a></li>
	          <li><a href="musiclist.html"><i class="icon-music icon-white"></i>Lista przebojów</a></li>
              <li><a href="<?php echo base_url('admin/show_all_votes'); ?>"><i class="icon-eye-open icon-white"></i>Głosowania</a></li>	
	          <li><a href="<?php echo base_url('admin/show_all_surveys'); ?>"><i class="icon-user icon-white"></i>Ankiety</a></li>
              <li><a href="<?php echo base_url('admin/show_all_compet'); ?>"><i class="icon-gift icon-white"></i>Konkursy</a></li>
              <li><a href="weather.html"><i class="icon-cog icon-white"></i>Pogoda</a></li>
            </ul>
		<ul class="nav pull-right">
		<li class="dropdown">
    			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock icon-white"></i>Panel administratora<b class="caret"></b></a>
    			<ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('admin/albums_showAll'); ?>">Albumy</a></li>
                            <li><a href="#">Artyści</a></li>
                            <li><a href="#">Radia</a></li>
                            <li><a href="#">Utwory</a></li>
                            <li><a href="#">Użytkownicy</a></li>
                            <li><a href="<?php echo base_url('admin/show_all_surveys'); ?>">Ankiety</a></li>
                            <li><a href="<?php echo base_url('admin/show_all_compet'); ?>">Konkursy</a></li>
                            <li><a href="<?php echo base_url('admin/show_all_votes'); ?>">Głosowania</a></li>
    			</ul>
		</li>
	    </ul>		  
          </div><!--/.nav-collapse -->
        </div>
      </div>