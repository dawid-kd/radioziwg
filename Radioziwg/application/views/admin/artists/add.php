<h3>Add</h3>

<?php echo form_open(base_url().'admin/artists_add'); ?>

<h5>Artist name</h5>
<?php echo form_error('artist_name'); ?>
<input type="text" name="artist_name" value="<?php echo set_value('artist_name'); ?>" size="50" />

<h5>Artist surname</h5>
<?php echo form_error('artist_surname'); ?>
<input type="text" name="artist_surname" value="<?php echo set_value('artist_surname'); ?>" size="50" />


<div class='clearfix'></div>
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />

<?php echo form_close() ?>