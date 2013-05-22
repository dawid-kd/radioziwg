<div class="container">
<div class="row">
<div class="span3">
                    <nav class="main">
                        <?php echo form_open('users/logout'); ?>
                        <h2>Zalogowany</h2>
                            <p>Zalogowany jako:</p>
                            <p><?php echo $this->session->userdata('username');?></p></br> 
                            
                             <p><button class="btn btn-primary" data-toggle="button" id="loginItems">Wyloguj</button> </p>
                             <?php echo form_close(); ?>
                            <p><a href="<?php echo render_url('changepass',''); ?>">Zmień hasło</a></p>
                            <p><a href="<?php echo render_url('changemail',''); ?>">Zmień adres</a></p>
                            <?php echo $this->session->flashdata('info');?>
                    </nav>
                    <aside class="aside-bg">
                        <h3 class="nagl">Przydatne linki</h3>
                        <ul class="unstyled">
                            <li><a href="http://www.musicarena.pl">Music Arena</a></li>
                            <li><a href="http://www.lastfm.pl">Last.fm</a></li>
                            <li><a href="http://www.rmf.fm/">RMF FM</a></li>
                        </ul>
                    </aside>
</div>