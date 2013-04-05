<?php
$fields = array(
	'passOld' => array(
		'id' => 'passOld',
		'name' => 'passOld',
		'label' => 'aktualne hasło',
		'class' => 'text ui-widget-content ui-corner-all',
		'value' => '',
		'type' => 'password',
	),
	'passNew1' => array(
		'id' => 'passNew1',
		'name' => 'passNew1',
		'label' => 'nowe hasło',
		'class' => 'text ui-widget-content ui-corner-all',
		'value' => '',
		'type' => 'password',
	),
	'passNew2' => array(
		'id' => 'passNew2',
		'name' => 'passNew2',
		'label' => 'powtórz nowe hasło',
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
		$('#usersChangePassword input:submit').button();
	});
</script>
<div id="usersChangePassword">
	<h1>Zmiana hasła</h1>
	<?= form_open() ?>
	<?= form_pos($fields['passOld']) ?>
	<?= form_pos($fields['passNew1']) ?>
	<?= form_pos($fields['passNew2']) ?>
	<?= form_pos($fields['submit']) ?>
	<?= form_close() ?>
</div>