<?php
$fields = array(
    'pass' => array(
        'id' => 'pass',
        'name' => 'pass',
        'value' => set_value('pass'),
        'class' => 'text ui-widget-content ui-corner-all',
    ),
    'pass2' => array(
        'id' => 'pass2',
        'name' => 'pass2',
        'value' => set_value('pass2'),
        'class' => 'text ui-widget-content ui-corner-all',
    ),
    'email' => array(
        'id' => 'email',
        'name' => 'email',
        'value' => set_value('email', ($editing) ? $user->email : ''),
        'class' => 'text ui-widget-content ui-corner-all',
        'required' => 'required',
    ),
    'fname' => array(
        'id' => 'fname',
        'name' => 'fname',
        'value' => set_value('fname', ($editing) ? $user->fname : ''),
        'class' => 'text ui-widget-content ui-corner-all',
        'required' => 'required',
    ),
    'lname' => array(
        'id' => 'lname',
        'name' => 'lname',
        'value' => set_value('lname', ($editing) ? $user->lname : ''),
        'class' => 'text ui-widget-content ui-corner-all',
        'required' => 'required',
    ),
    'isAdmin' => array(
        'id' => 'isAdmin',
        'name' => 'isAdmin',
        'value' => 1,
        'checked' => set_value('isAdmin', ($editing) ? $user->isAdmin : ''),
        'class' => 'text ui-widget-content ui-corner-all',
    ),
    'isBlocked' => array(
        'id' => 'isBlocked',
        'name' => 'isBlocked',
        'value' => 1,
        'checked' => set_value('isBlocked', ($editing) ? $user->isBlocked : ''),
        'class' => 'text ui-widget-content ui-corner-all',
    ),
);

$submit = array(
    'name' => 'submit',
    'value' => ($editing) ? 'Edytuj' : 'Zapisz',
    'class' => 'button',
);
?>
<script>
    $(function() {
        $('input:submit').button();

        $('#changePass').click(function(){
            $('#changePass').hide();
            $('#changePassDiv').slideDown('slow');
            return false;
        });
    });
</script>
<div class="main ui-widget-header">
    <span class="fl header"><?= $title ?><? if ($editing): ?> &bdquo;<?= $user->username ?>&rdquo;<? endif; ?></span>
    <div class="fr top_right_menu">
        <!-- -->
    </div>
    <div class="clr"></div>
</div>
<div class="cnt ui-widget-content">
    <?= form_open() ?>
    <div class="formPos">
        <div><?= form_label('imię', 'fname') ?></div>
        <div class="fl"><?= form_input($fields['fname']) ?></div>
        <div class="fl"><?= form_error('fname') ?></div>
        <div class="clr"></div>
    </div>
    <div class="formPos">
        <div><?= form_label('nazwisko', 'lname') ?></div>
        <div class="fl"><?= form_input($fields['lname']) ?></div>
        <div class="fl"><?= form_error('lname') ?></div>
        <div class="clr"></div>
    </div>
    <div class="formPos">
        <div><?= form_label('adres e-mail', 'email') ?></div>
        <div class="fl"><?= form_input($fields['email']) ?></div>
        <div class="fl"><?= form_error('email') ?></div>
        <div class="clr"></div>
    </div>
    <? if ($editing && $this->input->post('pass') == NULL && $this->input->post('pass2') == NULL): ?><a id="changePass" href="#">zmień hasło</a><? endif; ?>
    <div id="changePassDiv"<? if ($editing && $this->input->post('pass') == NULL && $this->input->post('pass2') == NULL): ?> class="hidden"<? endif; ?>>
        <div class="formPos">
            <div><?= form_label('hasło', 'pass') ?></div>
            <div class="fl"><?= form_password($fields['pass']) ?></div>
            <div class="fl"><?= form_error('pass') ?></div>
            <div class="clr"></div>
        </div>
        <div class="formPos">
            <div><?= form_label('powtórz hasło', 'pass2') ?></div>
            <div class="fl"><?= form_password($fields['pass2']) ?></div>
            <div class="fl"><?= form_error('pass2') ?></div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="formPos cb">
        <?= form_checkbox($fields['isAdmin']) ?>
        <?= form_label('użytkownik jest administratorem', 'isAdmin') ?>
    </div>
    <div class="formPos cb">
        <?= form_checkbox($fields['isBlocked']) ?>
        <?= form_label('użytkownik zablokowany', 'isBlocked') ?>
    </div>
    <div class="submit"><?= form_submit($submit) ?></div>
    <?= form_close() ?>
</div>