    <h3 class="pushLeft">Song list</h3>
    <a href="<?php echo render_url('admin/songs_add',''); ?>" class="pushRight btn">add new record</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Song</th>
                <th>Album</th>
                <th>Artist</th>    
                <th>Genre</th>    
                <th colspan="2">Functions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($aList as $aOne) : ?>
            <tr>
                <td><?php echo $aOne['id'] ?></td>
                <td><?php echo $aOne['song_name'] ?></td>
                <td><?php echo $aOne['album_name'] ?></td>
                <td><?php echo $aOne['artist_name'] ?></td>
                <td>
                    <?php foreach ($aOne['aGenre'] as $aOneGenre) : ?>
                        <?php echo $aOneGenre['name_genre'] ?><br />
                    <?php endforeach; ?>
                </td>
                <td><a class="btn" href="<?php echo base_url().'admin/songs_edit/'.$aOne['id'] ?>">Edit</a></td>
                <td>
                    <form class="deleteRecord" action="<?php echo base_url().'admin/songs_delete' ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
                        <input class="btn" type="submit" name="delete" value="Delete" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>