<?= doctype('html5') ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="all-apver" content="1fb3ece3bcc286c2ce655a31bb956775375128e8">
        <? if (isset($metas)): ?><?= meta($metas) ?><? endif; ?>
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="chrome=IE8"><![endif]-->
        <title><?= $title ?> - <?= $this->config->item('app_title') ?></title>
        <?= link_tag('style/front/style.css') ?>
        <?= link_tag('style/front/common.css') ?>
        <?= link_tag('style/js/jquery-ui.css') ?>
        <?= link_tag('style/favicon.ico', 'shortcut icon', 'image/ico') ?>
        <script src="<?= base_url('js/jquery.core.js') ?>"></script>
        <script src="<?= base_url('js/jquery.ui.js') ?>"></script>
        <script src="<?= base_url('js/jquery.url.js') ?>"></script>
        <script src="<?= base_url('js/jquery.actions.js') ?>"></script>
    </head>
    <body>
            <!--[if lt IE 8]><div style='clear: both; height: 59px; position: absolute; left: 50%; margin-left: -410px; z-index: 999;'><a href="http://windows.microsoft.com/pl-PL/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0017_polish.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div><![endif]-->
        <div class="wrapper-top">
            <div class="top">
                <a href="<?= base_url() ?>" class="top-left">
                    <h1>Politechnika Wrocławska</h1>
                    <h2>System Obsługi Zapisów Erasmus</h2>
                </a>
                <div class="top-right">
                    <?= Modules::run('box/front_login') ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div id="wrapper-shadow">
            <div id="content-wrapper">
                <div id="content">
                    <?= Modules::run('box/front_message') ?>
                    <? if (isset($content)): ?>
                        <?= $content ?>
                    <? endif; ?>
                </div>
            </div>
            <div class="clr"></div>
        </div>
        <div id="footer">
            <div id="footer-content">
                <div id="bottom_footer">
                    <div class="fl">Copyright &copy; <?= $this->config->item('app_create_year') ?>-<?= date('Y') ?> <?= $this->config->item('app_title') ?><? if (FALSE): ?> | Created by: <a href="http://www.ajnet.pl/" target="_blank" title="projektowanie portali">AJnet</a> &amp; <a href="http://www.global4net.com/" target="_blank" title="agencja interaktywna Wrocław">Global4Net</a><? endif; ?></div>
                    <div class="fr"><?= Modules::run('menu/frontFooter') ?></div>
                    <div class="clr"></div>
                </div>
            </div>
        </div>
        <!--[if lt IE 9]>
        <script src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
        <script>CFInstall.check({mode: "overlay", destination: "<?= base_url() ?>"});</script>
        <![endif]-->
    </body>
</html>