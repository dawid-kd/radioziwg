<div class="container">
<div class="row">
<div class="span3">
        <?php echo form_open(base_url().'users/login'); ?>
        <nav class="main">
            <h2>Logowanie</h2>
                <?php echo form_error('email'); ?>
                <p>Login:</p> <input type="text" name="email" maxlength="255" placeholder="login" />
                <?php echo form_error('password'); ?>
                <p>Hasło:</p> <input type="password" name="password" placeholder="hasło" />
                <p><button type="submit" class="btn btn-primary" data-toggle="button" id="loginItems">Zaloguj</button> </p>
                <p><a href ="register.html">Zarejestruj</a></p>
        </nav>
        </form> 
        <aside class="aside-bg">
            <h3 class="nagl">Przydatne linki</h3>
            <ul class="unstyled">
                <li><a href="http://www.musicarena.pl">Music Arena</a></li>
                <li><a href="http://www.lastfm.pl">Last.fm</a></li>
                <li><a href="http://www.rmf.fm/">RMF FM</a></li>
            </ul>
        </aside>
</div>