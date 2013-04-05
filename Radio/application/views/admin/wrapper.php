<?= doctype('html5') ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta author="global4net">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="chrome=IE8"><![endif]-->
        <title><?= $title ?> - Admin - <?= $this->config->item('app_title') ?></title>
        <?= link_tag('style/js/jquery-ui.css') ?>
        <?= link_tag('style/admin/style.css') ?>
        <?= link_tag('style/favicon.ico', 'shortcut icon', 'image/ico') ?>
        <script src="<?= base_url('js/jquery.core.js') ?>"></script>
        <script src="<?= base_url('js/jquery.ui.js') ?>"></script>
        <script src="<?= base_url('js/jquery.url.js') ?>"></script>
        <script src="<?= base_url('js/jquery.actions.admin.js') ?>"></script>
    </head>
    <body>
            <!--[if lt IE 8]><div style='clear: both; height: 59px; position: absolute; left: 50%; margin-left: -410px; z-index: 999;'><a href="http://windows.microsoft.com/pl-PL/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0017_polish.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div><![endif]-->
        <div id="main">
            <div id="topBar">
                <div class="fl">Witaj<? if ($this->uri->segment(2) != 'login'): ?>, <b><?= $this->session->userdata('username') ?></b><? endif; ?></div>
                <div class="fr top_buttons">
                    <a class="button home" href="<?= base_url() ?>">wróć na stronę główną</a>
                    <? if ($this->uri->segment(2) != 'login'): ?>
                        <a class="button logout" href="<?= base_url('admin/logout') ?>">wyloguj</a>
                        <? if ($this->User->isDev()): ?>
                            <a class="button tools" href="<?= base_url('admin/tools') ?>">narzędzia</a>
                        <? endif; ?>
                    <? endif; ?>
                </div>
                <div class="clr"></div>
            </div>
            <table id="tabContent">
                <tr>
                    <td colspan="3"><div class="crumbs"><?= set_breadcrumb() ?></div></td>
                </tr>
                <? if (isset($error)): ?>
                    <tr>
                        <td id="infoBox" colspan="2">
                            <div class="frame ui-state-error ui-corner-all">
                                <p>
                                    <span class="fl ui-icon ui-icon-alert"></span>
                                    <strong>Błąd</strong>: <?= $error ?>
                                </p>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                <? endif; ?>
                <? if ($this->session->flashdata('error') != ''): ?>
                    <tr>
                        <td id="infoBox" colspan="2">
                            <div class="frame ui-state-error ui-corner-all">
                                <p>
                                    <span class="fl ui-icon ui-icon-alert"></span>
                                    <strong>Błąd</strong>: <?= $this->session->flashdata('error') ?>
                                </p>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                <? endif; ?>
                <? if (isset($info)): ?>
                    <tr>
                        <td id="infoBox" colspan="2">
                            <div class="frame ui-state-highlight ui-corner-all">
                                <p>
                                    <span class="fl ui-icon ui-icon-info"></span>
                                    <strong>Informacja</strong>: <?= $info ?>
                                </p>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                <? endif; ?>
                <? if ($this->session->flashdata('info') != ''): ?>
                    <tr>
                        <td id="infoBox" colspan="2">
                            <div class="frame ui-state-highlight ui-corner-all">
                                <p>
                                    <span class="fl ui-icon ui-icon-info"></span>
                                    <strong>Informacja</strong>: <?= $this->session->flashdata('info') ?>
                                </p>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                <? endif; ?>
                <tr>
                    <td id="content">
                        <?= $content ?>
                    </td>
                    <?= Modules::run('menu/adminSidebarRight') ?>
                </tr>
                <tr>
                    <td>
                        <div id="footer">
                            <div class="copy">
                                <div class="fl">&copy; <?= $this->config->item('app_create_year') ?>-<?= date('Y') ?> <?= $this->config->item('app_title') ?> <small>({elapsed_time})</small></div>
                                <div class="fr"></div>
                                <div class="clr"></div>
                            </div>
                        </div>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
        <!--[if lt IE 9]>
                <script src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
                <script>CFInstall.check({mode: "overlay", destination: "<?= base_url() ?>"});</script>
        <![endif]-->
    </body>
</html>