<h3>Add</h3>

<?php echo form_open(render_url('admin/songs_add','')); ?>

<h5>Song name</h5>
<?php echo form_error('song_name'); ?>
<input type="text" name="song_name" value="" size="50" />

<h5>Album</h5>
<select name="id_album">
    <?php foreach ($aAlbums as $aOneAlbum) : ?>
    <option value="<?php echo $aOneAlbum['id'] ?>"><?php echo $aOneAlbum['album_name'] ?></option>
    <?php endforeach; ?>
</select>

<h5>Artist</h5>
<select name="id_artist">
    <?php foreach ($aArtists as $aOneArtist) : ?>
    <option value="<?php echo $aOneArtist['id'] ?>"><?php echo $aOneArtist['artist_name'] ?></option>
    <?php endforeach; ?>
</select>

<div class="clearfix"></div>
<div class="btn btn-small" id="addGenre">add genre</div>
<div id="genreList">
    <h5>Genre</h5>
    <div id="genreSelect">
        <select name="aGenreIds[]">
            <?php foreach ($aGenres as $aOneGenre) : ?>
            <option value="<?php echo $aOneGenre['id'] ?>"><?php echo $aOneGenre['name_genre'] ?></option>
            <?php endforeach; ?>
        </select>
        <div class="clearfix"></div>
    </div>
</div>


<div class='clearfix'></div>
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />

<?php echo form_close() ?>