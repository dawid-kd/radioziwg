<h3>Edit</h3>

<?php if ($sMsg) : ?>
<h4 class="text-success"><?php echo $sMsg ?></h4>
<?php endif; ?>

<?php echo form_open(render_url('admin/'.$sModuleName.'_edit/'.$aOne['id'],'')); ?>

<h5><?php echo ucfirst($sModuleName) ?> name</h5>
<?php echo form_error($sModuleName.'_name'); ?>
<input type="text" name="<?php echo $sModuleName ?>_name" value="<?php echo set_value($sModuleName.'_name', $aOne[$sModuleName.'_name']); ?>" size="50" />

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