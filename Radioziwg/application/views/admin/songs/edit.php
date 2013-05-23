<h3>Edit</h3>

<?php if ($sMsg) : ?>
<h4 class="text-success"><?php echo $sMsg ?></h4>
<?php endif; ?>

<?php echo form_open(render_url('admin/songs_edit/'.$aOne['id'],'')); ?>

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

<div class="clearfix"></div>
<div class="btn btn-small" id="addGenre">add genre</div>
<div id="genreList">
    <h5>Genre</h5>
        <?php if ($aOne['aGenre']) : ?>
            <?php foreach($aOne['aGenre'] as $key => $val) : ?>
                <?php if ($key == 0) : ?>
                    <div id="genreSelect">
                        <select name="aGenreIds[]">
                            <?php foreach ($aGenres as $aOneGenre) : ?>
                            <option value="<?php echo $aOneGenre['id'] ?>" <?php if($aOneGenre['name_genre'] == $val) : ?> selected="selected" <?php endif; ?>><?php echo $aOneGenre['name_genre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="clearfix"></div>
                    </div>
                <?php else : ?>
                    <select name="aGenreIds[]">
                        <?php foreach ($aGenres as $aOneGenre) : ?>
                        <option value="<?php echo $aOneGenre['id'] ?>" <?php if($aOneGenre['name_genre'] == $val) : ?> selected="selected" <?php endif; ?>><?php echo $aOneGenre['name_genre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <div id="genreSelect">
                <select name="aGenreIds[]">
                    <?php foreach ($aGenres as $aOneGenre) : ?>
                    <option value="<?php echo $aOneGenre['id'] ?>"><?php echo $aOneGenre['name_genre'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
</div>

<div class='clearfix'></div>
<input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />

<?php echo form_close() ?>