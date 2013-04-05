<?php
$fields = array(
	'emailNew' => array(
		'id' => 'emailNew',
		'name' => 'emailNew',
		'label' => 'nowy adres e-mail',
		'class' => 'text ui-widget-content ui-corner-all',
		'value' => '',
		'type' => 'email',
	),
	'userPass' => array(
		'id' => 'userPass',
		'name' => 'userPass',
		'label' => 'aktualne hasło',
		'class' => 'text ui-widget-content ui-corner-all',
		'value' => '',
		'type' => 'password',
	),
	'submit' => array(
		'id' => 'submit',
		'name' => 'submit',
		'class' => 'button',
		'value' => 'Zmień',
		'type' => 'submit',
	),
);
?>
<script>
	$(function() {
		$('#usersChangeEmail input:submit').button();
	});
</script>
<div id="usersChangeEmail">
	<h1>Zmiana adresu e-mail</h1>
	<?= form_open() ?>
	<?= form_pos($fields['emailNew']) ?>
	<?= form_pos($fields['userPass']) ?>
	<?= form_pos($fields['submit']) ?>
	<?= form_close() ?>
</div>