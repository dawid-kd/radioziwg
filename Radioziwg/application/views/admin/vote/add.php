<h3>Edycja</h3>
<?php echo form_open(base_url().'admin/vote_add'); ?>
<h5>Nazwa głosowania</h5>
<?php echo form_error('vote_name'); ?>
<input type="text" name="vote_name" value="" size="50" />
<h5>Opis</h5>
<?php echo form_error('description'); ?>
<input type="text" name="description" value="" size="100" />
<div class='clearfix'></div>
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />
<?php echo form_close() ?>