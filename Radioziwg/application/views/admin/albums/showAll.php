<h3>Album list</h3>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Album name</th>
                <th colspan="2">Functions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($aList as $aOne) : ?>
            <tr>
                <td><?php echo $aOne['id'] ?></td>
                <td><?php echo $aOne['album_name'] ?></td>
                <td><a class="btn" href="<?php echo base_url().'admin/albums_edit/'.$aOne['id'] ?>">Edytuj</a></td>
                <td>
                    <form class="deleteRecord" action="<?php echo base_url().'admin/albums_delete' ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
                        <input class="btn" type="submit" name="delete" value="Delete" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>