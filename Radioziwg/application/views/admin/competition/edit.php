<h3>Edycja</h3>

<?php if ($sMsg) : ?>
<h4 class="text-success"><?php echo $sMsg ?></h4>
<?php endif; ?>

<?php echo form_open(base_url().'admin/compet_edit/'.$Competition['id']); ?>
<h5>Nazwa konkursu</h5>
<?php echo form_error('competition_name'); ?>
<input type="text" name="competition_name" value="<?php echo set_value('competition_name', $Competition['competition_name']); ?>" size="50" />
<h5>Opis</h5>
<?php echo form_error('description'); ?>
<input type="text" name="description" value="<?php echo set_value('description', $Competition['description']); ?>" size="100" />
<h5>Początek konkursu</h5>
<?php echo form_error('start_date'); ?>
<input type="datetime" name="start_date" value="<?php echo set_value('start_date', $Competition['start_date']); ?>" size="20" />
<h5>Koniec konkursu</h5>
<?php echo form_error('end_date'); ?>
<input type="datetime" name="end_date" value="<?php echo set_value('end_date', $Competition['end_date']); ?>" size="20" />
<h5>Pytanie konkursowe</h5>
<?php echo form_error('question'); ?>
<input type="text" name="question" value="<?php echo set_value('question', $Competition['question']); ?>" size="100" />
<h5>Aktywne</h5>
<?php echo form_error('current'); ?>
<input type="text" name="current" value="<?php echo set_value('current', $Competition['current']); ?>" size="50" />
<div class='clearfix'></div>
<input type="hidden" name="id" value="<?php echo $Competition['id'] ?>" />
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />
<?php echo form_close() ?>