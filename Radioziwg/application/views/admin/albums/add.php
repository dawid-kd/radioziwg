<h3>Add</h3>

<form action="<?php echo base_url().'admin/albums_add/'?>" method="post">

<h5>Album name</h5>
<?php echo form_error('album_name'); ?>
<input type="text" name="album_name" value="<?php echo set_value('album_name'); ?>" size="50" />


<div class='clearfix'></div>
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />

</form>