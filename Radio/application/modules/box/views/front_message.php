<? if (isset($error)): ?>
	<div class="box error ui-state-error ui-corner-all">
		<p>
			<span class="fl ui-icon ui-icon-alert"></span>
			<strong>Błąd</strong>: <?= $error ?>
		</p>
	</div>
<? endif; ?>
<? if ($this->session->flashdata('error') != ''): ?>
	<div class="box error ui-state-error ui-corner-all">
		<p>
			<span class="fl ui-icon ui-icon-alert"></span>
			<strong>Błąd</strong>: <?= $this->session->flashdata('error') ?>
		</p>
	</div>
<? endif; ?>
<? if (isset($info)): ?>
	<div class="box info ui-state-highlight ui-corner-all">
		<p>
			<span class="fl ui-icon ui-icon-info"></span>
			<strong>Informacja</strong>: <?= $info ?>
		</p>
	</div>
<? endif; ?>
<? if ($this->session->flashdata('info') != ''): ?>
	<div class="box info ui-state-highlight ui-corner-all">
		<p>
			<span class="fl ui-icon ui-icon-info"></span>
			<strong>Informacja</strong>: <?= $this->session->flashdata('info') ?>
		</p>
	</div>
<? endif; ?>