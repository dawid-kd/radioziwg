<?php 
$fields = array(
	'email' => array(
		'id' => 'email',
		'name' => 'email',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => set_value('email'),
		'label' => 'adres e-mail',
		'type' => 'text',
	),
	'pass' => array(
		'id' => 'pass',
		'name' => 'pass',
		'label' => 'hasło',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => '',
		'type' => 'password',
	),
	'pass1' => array(
		'id' => 'pass1',
		'name' => 'pass1',
		'label' => 'ponownie hasło',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => '',
		'type' => 'password',
	),
	'username' => array(
		'id' => 'username',
		'name' => 'username',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => set_value('username'),
		'label' => 'nazwa wyświetlana (nick)',
		'type' => 'text',
	),
	'fname' => array(
		'id' => 'fname',
		'name' => 'fname',
		'label' => 'imię',
		'class' => 'text ui-widget-content ui-corner-all',
		'value' => set_value('fname'),
		'type' => 'text',
	),
	'lname' => array(
		'id' => 'lname',
		'name' => 'lname',
		'label' => 'nazwisko',
		'class' => 'text ui-widget-content ui-corner-all',
		'value' => set_value('lname'),
		'type' => 'text',
	),
	'rulesConfirm' => array(
		'id' => 'rulesConfirm',
		'name' => 'rulesConfirm',
		'label' => "zgadzam się z postanowieniami <a href='" . base_url('regulamin') . "' tabindex='-1'>regulaminu</a>",
		'checked' => set_value('rulesConfirm', 0),
		'value' => 1,
		'type' => 'checkbox',
	),
	'type' => array(
		'id' => 'type',
		'name' => 'type',
		'label' => 'typ konta',
		'select' => array('regular' => 'konto zwykłe', 'company' => 'firma', 'politician' => 'polityk', 'institution' => 'instytucja'),
		'type' => 'dropdown',
		'value' => set_value('type', 'regular'),
	),
	'submit' => array(
		'id' => 'submit',
		'name' => 'submit',
		'class' => 'button',
		'value' => 'Zarejestruj',
		'type' => 'submit',
	),
);
?>
<script>
	$(function() {
		$('#usersRegister input:submit').button();
	});
</script>
<div id="usersRegister">
	<h1>Rejestracja</h1>
	<?= form_open() ?>
	<?= form_pos($fields['type']) ?>
	<?= form_pos($fields['email']) ?>
	<?= form_pos($fields['pass']) ?>
	<?= form_pos($fields['pass1']) ?>
	<?= form_pos($fields['username']) ?>
	<?= form_pos($fields['fname']) ?>
	<?= form_pos($fields['lname']) ?>
	<?= form_pos($fields['rulesConfirm']) ?>
	<div class="formPos">
		<div><?= form_label('kod potwierdzający', 'recaptcha_response_field') ?></div>
		<div class="fl"><?= $recaptcha ?></div>
		<div class="fl"><?= form_error('recaptcha_response_field') ?></div>
		<div class="clr"></div>
	</div>
	<?= form_pos($fields['submit']) ?>
	<?= form_close() ?>
</div>