    <h3 class="pushLeft"><?php echo ucfirst($sModuleName) ?> list</h3>
    <a href="<?php echo base_url().'admin/'.$sModuleName.'_add' ?>" class="pushRight btn">add new record</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th><?php echo ucfirst($sModuleName) ?> name</th>  
                <th>Genre</th>    
                <th colspan="2">Functions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($aList as $aOne) : ?>
            <tr>
                <td><?php echo $aOne['id'] ?></td>
                <td><?php echo $aOne[$sModuleName.'_name'] ?></td>
                <td>
                    <?php foreach ($aOne['aGenre'] as $aOneGenre) : ?>
                        <?php echo $aOneGenre['name_genre'] ?><br />
                    <?php endforeach; ?>
                </td>
                <td><a class="btn" href="<?php echo base_url().'admin/'.$sModuleName.'_edit/'.$aOne['id'] ?>">Edit</a></td>
                <td>
                    <form class="deleteRecord" action="<?php echo base_url().'admin/'.$sModuleName.'_delete' ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
                        <input class="btn" type="submit" name="delete" value="Delete" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>