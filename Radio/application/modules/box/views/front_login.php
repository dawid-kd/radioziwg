<? if ($this->User->isLogged()) : ?>
    <a href="<?= base_url('account') ?>">Mojea konto</a>
    <a href="<?= base_url('logout') ?>">Wyloguj</a>
<? else : ?>
    <a href="<?= base_url('register') ?>">Zapisz się</a>
    <a href="<?= base_url('login') ?>">Zaloguj</a>
<? endif; ?>
