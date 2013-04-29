<?php if ($sMsg) : ?>
<h4 class="text-success"><?php echo $sMsg ?></h4>
<?php endif; ?>

<?php echo form_open(base_url().'admin/survey_option_edit/'.$Option['id']); ?>
<h5>Nazwa opcji</h5>
<?php echo form_error('option_name'); ?>
<input type="text" name="option_name" value="<?php echo set_value('option_name', $Option['option_name']); ?>" size="50" />
<h5>Oddane głosy</h5>
<?php echo form_error('option_count'); ?>
<input type="text" name="option_count" value="<?php echo set_value('option_count', $Option['option_count']); ?>" size="100" />
<div class='clearfix'></div>
<input type="hidden" name="id_survey" value="<?php echo $Survey['id'] ?>" />
<input type="hidden" name="id" value="<?php echo $Option['id'] ?>" />
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />
<?php echo form_close() ?>