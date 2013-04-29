<h3>Edycja</h3>

<?php if ($sMsg) : ?>
<h4 class="text-success"><?php echo $sMsg ?></h4>
<?php endif; ?>

<?php echo form_open(base_url().'admin/vote_edit/'.$Vote['id']); ?>
<h5>Nazwa głosowania</h5>
<?php echo form_error('vote_name'); ?>
<input type="text" name="vote_name" value="<?php echo set_value('vote_name', $Vote['vote_name']); ?>" size="50" />
<h5>Opis</h5>
<?php echo form_error('description'); ?>
<input type="text" name="description" value="<?php echo set_value('description', $Vote['description']); ?>" size="100" />
<div class='clearfix'></div>
<input type="hidden" name="id" value="<?php echo $Vote['id'] ?>" />
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />
<?php echo form_close() ?>