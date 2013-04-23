<h3>Edit</h3>

<?php if ($sMsg) : ?>
<h4 class="text-success"><?php echo $sMsg ?></h4>
<?php endif; ?>

<?php echo form_open(base_url().'admin/albums_edit/'.$aOne['id']); ?>
<form action="<?php echo base_url().'admin/albums_edit/'.$aOne['id']?>" method="post">

<h5>Album name</h5>
<?php echo form_error('album_name'); ?>
<input type="text" name="album_name" value="<?php echo set_value('album_name', $aOne['album_name']); ?>" size="50" />


<div class='clearfix'></div>
<input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />

</form>