<style>
	#content .cnt {
		min-height: 111px;
	}

	#tabContent {
		min-width: 300px !important;
	}

	#main {
		width: 362px;
	}
</style>
<script>
	$(function() {
		$('input:submit').button();
	});
</script>
<div class="main ui-widget-header">
	<span class="fl header"><?= $title ?></span>
	<div class="fr top_right_menu">
		<!-- -->
	</div>
	<div class="clr"></div>
</div>
<div id="admin_login" class="cnt ui-widget-content">
	<? if (isset($loginError)): ?>
		<div class="box error ui-state-error ui-corner-all">
			<p><span class="fl ui-icon ui-icon-alert"></span><b>Błąd</b>: <?= $loginError ?></p>
			<div class="clr"></div>
		</div>
	<? endif; ?>
	<?= form_open('admin/login') ?>
	<input type="email" name="login" placeholder="adres e-mail" required class="ui-widget-content ui-corner-all required">
	<input type="password" name="password" placeholder="hasło" required class="ui-widget-content ui-corner-all required">
	<input type="submit" name="form_login" value="Zaloguj" class="button">
	<?= form_close() ?>
</div>