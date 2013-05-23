<div class="container">
<div class="row">
<div class="span3">
                    <nav class="main">
                        <?php echo form_open('users/login'); ?>
                        <h2>Logowanie</h2>
                            <p>Login: <input type="text" name="email" maxlength="255" placeholder="login" style="width:130px; id="loginItems" /></p>
                                    <p>Hasło: <input type="password" name="password" placeholder="hasło" style="width:130px; id="loginItems" /> </p>
                                    <p><button class="btn btn-primary" data-toggle="button" id="loginItems">Zaloguj</button> </p>
                                    <?php echo $this->session->flashdata('error');?>
                             <?php echo form_close(); ?>       
                            <p><a href ="<?php echo render_url('register',''); ?>">Zarejestruj</a></p>
                            <p><a href ="<?php echo render_url('forgot',''); ?>">Zapomniałem hasła</a></p>
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