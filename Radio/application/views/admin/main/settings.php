<?php
$fields = array(
	'rules' => array(
		'id' => 'rules',
		'name' => 'rules',
		'label' => 'regulamin serwisu',
		'value' => set_value('rules', $settings['rules']),
		'class' => 'jquery_ckeditor text ui-widget-content ui-corner-all',
		'type' => 'textarea',
	),
	'privacy' => array(
		'id' => 'privacy',
		'name' => 'privacy',
		'label' => 'polityka prywatności',
		'value' => set_value('privacy', $settings['privacy']),
		'class' => 'jquery_ckeditor text ui-widget-content ui-corner-all',
		'type' => 'textarea',
	),
	'publicity' => array(
		'id' => 'publicity',
		'name' => 'publicity',
		'label' => 'reklama',
		'value' => set_value('publicity', $settings['publicity']),
		'class' => 'jquery_ckeditor text ui-widget-content ui-corner-all',
		'type' => 'textarea',
	),
	'submit' => array(
		'id' => 'submit',
		'name' => 'submit',
		'class' => 'button',
		'value' => 'Zapisz',
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
<div class="main ui-widget-header">
	<span class="fl header"><?= $title ?></span>
	<div class="fr top_right_menu">
		<!-- -->
	</div>
	<div class="clr"></div>
</div>
<div class="cnt ui-widget-content">
	<?= form_open() ?>
	<?= form_pos($fields['rules']) ?>
	<?= form_pos($fields['privacy']) ?>
	<?= form_pos($fields['publicity']) ?>
	<?= form_pos($fields['submit']) ?>
	<?= form_close() ?>
</div>