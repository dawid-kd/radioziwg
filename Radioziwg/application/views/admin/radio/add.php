<h3>Add</h3>

<?php echo form_open(base_url().'admin/'.$sModuleName.'_add'); ?>

<h5><?php echo ucfirst($sModuleName) ?> name</h5>
<?php echo form_error($sModuleName.'_name'); ?>
<input type="text" name="<?php echo $sModuleName ?>_name" value="" size="50" />

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