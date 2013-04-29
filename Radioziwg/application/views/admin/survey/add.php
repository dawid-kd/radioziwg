<h3>Dodawanie</h3>
<?php echo form_open(base_url().'admin/survey_add'); ?>
<h5>Nazwa ankiety</h5>
<?php echo form_error('survey_name'); ?>
<input type="text" name="survey_name" value="" size="50" />
<h5>Pytanie</h5>
<?php echo form_error('question'); ?>
<input type="text" name="question" value="" size="100" />
<h5>Aktywny</h5>
<?php echo form_error('current'); ?>
<input type="text" name="current" value="T" size="100" />
<div class='clearfix'></div>
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />
<?php echo form_close() ?>