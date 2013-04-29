<h3>Dodawanie</h3>

<?php echo form_open(base_url().'admin/compet_add'); ?>
<h5>Nazwa konkursu</h5>
<?php echo form_error('competition_name'); ?>
<input type="text" name="competition_name" value="" size="50" />
<h5>Opis</h5>
<?php echo form_error('description'); ?>
<input type="text" name="description" value="" size="100" />
<h5>Początek konkursu</h5>
<?php echo form_error('start_date'); ?>
<input type="datetime" name="start_date" value="<?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s');?>" size="20" />
<h5>Koniec konkursu</h5>
<?php echo form_error('end_date'); ?>
<input type="datetime" name="end_date" value="<?php $date = new DateTime(); $date->modify('+7 day'); echo $date->format('Y-m-d H:i:s'); ?>" size="20" />
<h5>Pytanie konkursowe</h5>
<?php echo form_error('question'); ?>
<input type="text" name="question" value="" size="100" />
<h5>Aktywne</h5>
<?php echo form_error('current'); ?>
<input type="text" name="current" value="T" size="50" />
<div class='clearfix'></div>
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />
<?php echo form_close() ?>