<?php
$fields = array(
	'subject' => array(
		'id' => 'subject',
		'name' => 'subject',
		'label' => 'temat',
		'value' => $this->input->post('subject'),
		'class' => 'text ui-widget-content ui-corner-all',
		'type' => 'text',
	),
	'content' => array(
		'id' => 'editor1',
		'name' => 'content',
		'label' => 'treść',
		'value' => $this->input->post('content'),
		'class' => 'jquery_ckeditor',
		'type' => 'textarea',
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
<script src="<?= base_url('js/ckeditor/ckeditor.js') ?>"></script>
<script src="<?= base_url('js/ckeditor/adapters/jquery.js') ?>"></script>
<script>
	$(function() {
		$('input:submit').button();
		$('.jquery_ckeditor').ckeditor();
	});
</script>
<h1 class="ui-widget-header">
	<span class="fl"><?= $title ?></span>
	<div class="clr"></div>
</h1>
<div class="cnt ui-widget-content">
	<?= form_open() ?>
	<?= form_pos($fields['subject']) ?>
	<?= form_pos($fields['content']) ?>
	<?= form_pos($fields['submit']) ?>
	<?= form_close() ?>
</div>