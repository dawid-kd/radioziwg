<?php
$fields = array(
	'username' => array(
		'id' => 'username',
		'name' => 'username',
		'label' => 'nazwa użytkownika',
		'value' => set_value('username', $user->username),
		'class' => 'text ui-widget-content ui-corner-all required',
		'type' => 'text',
	),
	'fname' => array(
		'id' => 'fname',
		'name' => 'fname',
		'label' => 'imię',
		'value' => set_value('fname', $user->fname),
		'class' => 'text ui-widget-content ui-corner-all',
		'type' => 'text',
	),
	'lname' => array(
		'id' => 'lname',
		'name' => 'lname',
		'label' => 'nazwisko',
		'value' => set_value('lname', $user->lname),
		'class' => 'text ui-widget-content ui-corner-all',
		'type' => 'text',
	),
	'city' => array(
		'id' => 'city',
		'name' => 'city',
		'label' => 'miasto<i>: wybierz województwo</i>',
		'class' => 'text ui-widget-content ui-corner-all required cities',
		'value' => set_value('city', $user->city),
		'type' => 'dropdown',
		'select' => $cities,
	),
	'region' => array(
		'id' => 'region',
		'name' => 'region',
		'label' => 'województwo',
		'class' => 'text ui-widget-content ui-corner-all required',
		'value' => set_value('region', $user->region),
		'type' => 'dropdown',
		'select' => $regions,
	),
	'company' => array(
		'id' => 'company',
		'name' => 'company',
		'label' => 'firma',
		'value' => set_value('company', $user->company),
		'class' => 'text ui-widget-content ui-corner-all',
		'type' => 'text',
	),
	'phone' => array(
		'id' => 'phone',
		'name' => 'phone',
		'label' => 'telefon',
		'value' => set_value('phone', $user->phone),
		'class' => 'text ui-widget-content ui-corner-all',
		'type' => 'text',
	),
	'aboutMe' => array(
		'id' => 'aboutMe',
		'name' => 'aboutMe',
		'label' => 'o mnie',
		'value' => set_value('aboutMe', $user->aboutMe),
		'class' => 'text ui-widget-content ui-corner-all jquery_ckeditor',
		'type' => 'textarea',
	),
	'interest' => array(
		'id' => 'interest',
		'name' => 'interest',
		'label' => 'zainteresowania',
		'value' => set_value('interest', $user->interest),
		'class' => 'text ui-widget-content ui-corner-all jquery_ckeditor',
		'type' => 'textarea',
	),
	'logoFile' => array(
		'id' => 'logoFile',
		'name' => 'logoFile',
		'label' => 'awatar',
		'class' => 'text ui-widget-content ui-corner-all',
		'src' => $user->thumbUrl,
		'extensions' => '.jpg, .png',
		'type' => 'file',
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
<script src="<?= base_url('js/ckeditor/ckeditor.js') ?>"></script>
<script src="<?= base_url('js/ckeditor/adapters/jquery.js') ?>"></script>
<script>
	$(function() {
		$('.jquery_ckeditor').ckeditor();

		$('#users_profile a.button.password').button({
			icons: {primary: 'ui-icon-key'}
		}).next('a.button.email').button({
			icons: {primary: 'ui-icon-mail-closed'}
		}).parent().buttonset();

		function changeCity() {
			if ($('select[name="region"]').val() > 0) {
				$('label[for=city] i').hide();

				if ($('select[name="region"]').val() != 0) {
					$.post(baseUrl + 'ajax/getCitiesOptions', {
						region: $('select[name="region"]').val()
					}, function(data) {
						$('select[name="city"]').html(data);
						$('select[name="city"]').val(<?= isset($user->city) ? $user->city : 0 ?>);
					});
					$('select[name="city"]').show();
				} else {
					$('label[for=city] i').hide();
				}
			} else {
				$('select[name="city"]').val(0);
				$('select[name="city"]').hide();
				$('label[for=city] i').show();
			}
		}

		$('select[name="region"]').change(function() {
			changeCity();
		});

		changeCity();
	});
</script>
<div id="users_profile">
	<h1 class="fl">Mój profil</h1>
	<? if ($this->User->getId() == $user->id): ?>
		<div class="fr">
			<a class="button password" href="<?= base_url('profil/zmien-haslo') ?>">zmień hasło</a>
			<a class="button email" href="<?= base_url('profil/zmien-email') ?>">zmień adres e-mail</a>
		</div>
	<? endif; ?>
	<div class="clr"></div>
	<?= form_open_multipart(current_url()) ?>
	<?= form_pos($fields['username']) ?>
	<?= form_pos($fields['fname']) ?>
	<?= form_pos($fields['lname']) ?>
	<?= form_pos($fields['region']) ?>
	<?= form_pos($fields['city']) ?>
	<?= form_pos($fields['company']) ?>
	<?= form_pos($fields['phone']) ?>
	<?= form_pos($fields['aboutMe']) ?>
	<?= form_pos($fields['interest']) ?>
	<?= form_pos($fields['logoFile']) ?>
	<?= form_pos($fields['submit']) ?>
	<?= form_close() ?>
</div>
<div class="clr"></div>