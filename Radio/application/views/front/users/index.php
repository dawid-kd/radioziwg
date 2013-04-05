<div id="usersIndex">
	<? if (count($users_ft)): ?>
		<h1>Wyróżnieni</h1>
		<? foreach ($users_ft as $key => $item): ?>
			<? if ($key % 6 == 0): ?>
				<div class="clr"></div>
			<? endif; ?>
			<div class="fl item_tile featured">
				<a href="<?= base_url($item->url) ?>">
					<img src="<?= base_url($item->thumbUrl) ?>">
					<br>
					<?= $item->username ?>
				</a>
			</div>
		<? endforeach; ?>
	<? endif; ?>
	<div class="clr"></div>
	<br>
	<h1>Pozostali</h1>
	<? if (count($users)): ?>
		<? foreach ($users as $key => $item): ?>
			<? if ($key % 6 == 0): ?>
				<div class="clr"></div>
			<? endif; ?>
			<div class="fl item_tile">
				<a href="<?= base_url($item->url) ?>">
					<img src="<?= base_url($item->thumbUrl) ?>">
					<br>
					<?= $item->username ?>
				</a>
			</div>
		<? endforeach; ?>
		<div class="clr"></div>
		<div style="margin: 0 auto; width: 182px;"><?= $pagination ?></div>
	<? else: ?>
		<div>Brak użytkowników</div>
	<? endif; ?>
	<div class="clr"></div>
</div>