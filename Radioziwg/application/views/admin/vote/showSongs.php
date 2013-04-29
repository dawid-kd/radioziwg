<h3>Głosowanie</h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa głosowania</th>
            <th>Opis</th>
            <th colspan="2">Funkcje</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><?php echo $Vote['id'] ?></td>
            <td><?php echo $Vote['vote_name'] ?></td>
            <td><?php echo $Vote['description'] ?></td>
            <td><a href="<?php echo base_url().'admin/vote_edit/'.$Vote['id'] ?>">Edytuj</a></td>
            <td><a href="<?php echo base_url().'admin/vote_delete/'.$Vote['id'] ?>">Usuń</a></td>
        </tr>
    </tbody>
</table>
<h3>Zestawienie tytułów</h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>   
            <th>Tytuł piosenki</th>
            <th>Oddane głosy</th>
            <th>Usuń piosenkę</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($Songs as $Song) : ?>
        <tr>
            <td><?php echo $Song['id'] ?></td>
            <td><?php foreach ($SongsNames as $SongName){
            			 if($Song['id_song']==$SongName['id']) 
            			 	echo $SongName['song_name']; 
				};?></td>
			<td><?php echo $Song['votes_count'] ?></td>
            <td><a href="<?php echo base_url().'admin/vote_song_delete/'.$Song['id'] ?>">Usuń</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Dodawanie</h3>

<?php echo form_open(""); ?>
<h5>Tytuł piosenki</h5>

<?php $options; foreach($SongsNames as $SongName){
				$options[$SongName['id']] = $SongName['song_name'];
		}; 
		echo form_dropdown('songs', $options, set_value('1')); 
?>
<div class='clearfix'></div>
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Dodaj piosenkę" />
<?php echo form_close() ?>