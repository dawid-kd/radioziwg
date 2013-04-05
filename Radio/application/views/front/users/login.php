<?php
$fields = array(
	'email' => array(
		'id' => 'email',
		'name' => 'email',
		'label' => 'adres e-mail',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => set_value('email'),
		'type' => 'email',
	),
	'pass' => array(
		'id' => 'pass',
		'name' => 'pass',
		'label' => 'hasło',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => '',
		'type' => 'password',
	),
	'submit' => array(
		'id' => 'submit',
		'name' => 'submit',
		'value' => 'Zaloguj się',
		'class' => 'button',
		'type' => 'submit',
	),
);
?>
<script>
	$(function() {
		$('#usersLogin input:submit').button();
	});
</script>
<div id="usersLogin">
	<h1>Logowanie</h1>
	<?= form_open() ?>
	<?= form_pos($fields['email']) ?>
	<?= form_pos($fields['pass']) ?>
	<small><a href="<?= base_url('wyslij-haslo') ?>">zapomniałem hasła</a></small>
	<?= form_pos($fields['submit']) ?>
	<?= form_close() ?>
</div>