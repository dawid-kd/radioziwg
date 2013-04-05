<?php
$fields = array(
	'email' => array(
		'id' => 'email',
		'name' => 'email',
		'label' => 'adres e-mail',
		'class' => 'text ui-widget-content ui-corner-all',
		'value' => '',
		'type' => 'text',
	),
	'submit' => array(
		'id' => 'submit',
		'name' => 'submit',
		'class' => 'button',
		'value' => 'Wyślij',
		'type' => 'submit',
	),
);
?>
<script>
	$(function() {
		$('#usersSendPass input:submit').button();
	});
</script>
<div id="usersSendPass">
	<h1>Wyślij hasło</h1>
	<?= form_open() ?>
	<?= form_pos($fields['email']) ?>
	<?= form_pos($fields['submit']) ?>
	<?= form_close() ?>
</div>