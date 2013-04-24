<h3>Edit</h3>

<?php if ($sMsg) : ?>
<h4 class="text-success"><?php echo $sMsg ?></h4>
<?php endif; ?>

<?php echo form_open(base_url().'admin/songs_edit/'.$aOne['id']); ?>

<h5>Song name</h5>
<?php echo form_error('song_name'); ?>
<input type="text" name="song_name" value="<?php echo set_value('song_name', $aOne['song_name']); ?>" size="50" />

<h5>Album</h5>
<select name="id_album">
    <?php foreach ($aAlbums as $aOneAlbum) : ?>
    <option value="<?php echo $aOneAlbum['id'] ?>" <?php if( $aOne['id_album'] == $aOneAlbum['id']): ?> selected="selected" <?php endif; ?>><?php echo $aOneAlbum['album_name'] ?></option>
    <?php endforeach; ?>
</select>

<h5>Artist</h5>
<select name="id_artist">
    <?php foreach ($aArtists as $aOneArtist) : ?>
    <option value="<?php echo $aOneArtist['id'] ?>" <?php if( $aOne['id_artist'] == $aOneArtist['id']): ?> selected="selected" <?php endif; ?>><?php echo $aOneArtist['artist_name'] ?></option>
    <?php endforeach; ?>
</select>

<p>Todo: songs genre</p>

<div class='clearfix'></div>
<input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />

<?php echo form_close() ?>