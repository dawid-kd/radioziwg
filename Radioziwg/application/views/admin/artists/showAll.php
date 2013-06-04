    <h3 class="pushLeft">Artist list</h3>
    <a href="<?php echo render_url('admin/artists_add','') ?>" class="pushRight btn">add new record</a>

    <table class="table footable">
        <thead>
            <tr>
                <th data-hide="phone">ID</th>
                <th data-class="expand">Artist name</th>
                <th data-hide="phone">Artist surname</th>
                <th colspan="2" data-hide="phone">Functions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($aList as $aOne) : ?>
            <tr>
                <td><?php echo $aOne['id'] ?></td>
                <td><?php echo $aOne['artist_name'] ?></td>
                <td><?php echo $aOne['artist_surname'] ?></td>
                <td><a class="btn" href="<?php echo base_url().'admin/artists_edit/'.$aOne['id'] ?>">Edit</a></td>
                <td>
                    <form class="deleteRecord" action="<?php echo base_url().'admin/artists_delete' ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
                        <input class="btn" type="submit" name="delete" value="Delete" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>