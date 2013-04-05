<?php
$fields = array(
	'name' => array(
		'id' => 'name',
		'name' => 'name',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => set_value('name'),
		'label' => 'imię i nazwisko',
		'type' => 'text',
	),
	'email' => array(
		'id' => 'email',
		'name' => 'email',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => set_value('email'),
		'label' => 'adres e-mail',
		'type' => 'text',
	),
	'topic' => array(
		'id' => 'topic',
		'name' => 'topic',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => set_value('topic'),
		'label' => 'temat',
		'type' => 'text',
	),
	'message' => array(
		'id' => 'message',
		'name' => 'message',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => set_value('message'),
		'rows' => 10,
		'cols' => 72,
		'label' => 'treść wiadomości',
		'type' => 'textarea',
	),
	'receiver' => array(// do zmiany na form_pos
		'email_general' => 'biuro',
		'email_redaction' => 'redakcja',
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
		$('#mainContact input:submit').button();
	});
</script>
<div id="mainContact">
	<?= form_open() ?>
	<div class="formPos">
		<div><?= form_label('odbiorca', 'receiver') ?></div>
		<div class="fl"><?= form_dropdown('receiver', $fields['receiver']) ?></div>
		<div class="fl"><?= form_error('receiver') ?></div>
		<div class="clr"></div>
	</div>
	<?= form_pos($fields['name']) ?>
	<?= form_pos($fields['email']) ?>
	<?= form_pos($fields['topic']) ?>
	<?= form_pos($fields['message']) ?>
	<? if (isset($recaptcha)): ?>
		<div class="formPos">
			<div><?= form_label('kod potwierdzający', 'recaptcha_response_field') ?></div>
			<div class="fl"><?= $recaptcha ?></div>
			<div class="fl"><?= form_error('recaptcha_response_field') ?></div>
			<div class="clr"></div>
		</div>
	<? endif; ?>
	<?= form_pos($fields['submit']) ?>
	<?= form_close() ?>
</div>