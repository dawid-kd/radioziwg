<?php
$keywords = array(
	'name' => 'keywords',
	'class' => '',
	'placeholder' => 'nazwa',
	'value' => isset($_POST['keywords']) ? $_POST['keywords'] : '',
);

$orderBy = array(
	'u.regDate' => 'wg daty',
	'u.username' => 'wg nazwy',
);

$orderDir = array('desc' => 'z-a', 'asc' => 'a-z');
$limit = array('10' => '10', '25' => '25', '50' => '50', '75' => '75', '100' => '100');
?>
<script>
	$(function() {
		$('input:submit').button();

		$('.deleteItem').click(function() {
			return confirm('Jesteś pewien, że chcesz usunąć tego użytkownika?');
		});

		$('.unblocked a').click(function() {
			return confirm('Jesteś pewien, że chcesz odblokować tego użytkownika?');
		});

		$('.top_right_menu a.button.filter').button({
			icons: {primary: 'ui-icon-shuffle'}, text: false
		}).click(function() {
			$('.headerMiniForm').toggle();
			return false;
		}).next('a.button.add').button({
			icons: {primary: 'ui-icon-plus'}
		}).parent().buttonset();

		$('#listItems li').mouseover(function(){
			$(this).find('.unblocked').show();
			$(this).find('.blocked').hide();
		});

		$('#listItems li').mouseout(function(){
			$(this).find('.unblocked').hide();
			$(this).find('.blocked').show();
		});
	});
</script>
<div class="main ui-widget-header">
	<span class="fl header"><?= $title ?></span>
	<div class="fr top_right_menu">
		<a class="button filter" href="<?= current_url() ?>">filtruj</a>
		<a class="button add" href="<?= base_url('admin/users/add') ?>">dodaj</a>
	</div>
	<div class="clr"></div>
</div>
<div class="top">
	<div class="fr nfo ui-widget-header">pozycji: <b><?= $counter ?></b></div>
	<div class="fr headerMiniForm ui-widget-header<? if (count($_POST) == 0): ?> hidden<? endif; ?>">
		<?= form_open() ?>
		<?= form_input($keywords) ?>
		<?= form_dropdown('orderBy', $orderBy) ?>
		<?= form_dropdown('orderDir', $orderDir) ?>
		<?= form_dropdown('limit', $limit) ?>
		<?= form_submit('filter', 'filtruj') ?>
		<?= form_close() ?>
	</div>
	<div class="clr"></div>
</div>
<div class="cnt">
	<ul id="listItems">
		<? foreach ($users as $user): ?>
			<li>
				<div class="item ui-state-default" style="border-left: 5px solid <?= ($user->isAdmin == 1) ? 'red' : 'green' ?>;">
					<div class="fl content">
						<span class="main"><b><?= $user->username ?></b></span>
						<div class="desc">rejestracja: <b><?= $user->regDate->format('Y.m.d, H:i') ?></b>, e-mail: <b><?= $user->email ?></b></div>
					</div>
					<div class="fr controls">
						<a href="<?= base_url('admin/users/' . $user->id . '/edit') ?>">edytuj</a>
						<br>
						<a class="deleteItem" href="<?= base_url('admin/users/' . $user->id . '/delete') ?>">usuń</a>
					</div>
					<div class="fr itemRight">
						<span><?= sprintf('#%d', $user->id) ?></span>
						<? if ($user->isBlocked): ?>
							<br>
							<span class="lock blocked">zablokowany</span>
							<span class="lock unblocked hidden"><a href="<?= base_url('admin/users/' . $user->id . '/unlock') ?>">odblokuj</a></span>
						<? endif; ?>
					</div>
					<div class="clr"></div>
				</div>
			</li>
		<? endforeach; ?>
	</ul>
	<div class="fr"><br><?= $pagination ?></div>
	<div class="clr"></div>
</div>