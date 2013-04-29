<h3>Edycja</h3>

<?php if ($sMsg) : ?>
<h4 class="text-success"><?php echo $sMsg ?></h4>
<?php endif; ?>

<?php echo form_open(base_url().'admin/survey_edit/'.$Survey['id']); ?>
<h5>Nazwa ankiety</h5>
<?php echo form_error('survey_name'); ?>
<input type="text" name="survey_name" value="<?php echo set_value('survey_name', $Survey['survey_name']); ?>" size="50" />
<h5>Pytanie</h5>
<?php echo form_error('question'); ?>
<input type="text" name="question" value="<?php echo set_value('question', $Survey['question']); ?>" size="100" />
<h5>Aktualna</h5>
<?php echo form_error('current'); ?>
<input type="text" name="current" value="<?php echo set_value('current', $Survey['current']); ?>" size="100" />
<div class='clearfix'></div>
<input type="hidden" name="id" value="<?php echo $Survey['id'] ?>" />
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />
<?php echo form_close() ?>