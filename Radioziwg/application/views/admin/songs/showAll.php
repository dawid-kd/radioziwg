<h3>Song list</h3>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>E-mail</th>    
                <th>Ulica</th>    
                <th>Kod pocztowy</th>    
                <th>Miejscowość</th>
                <th colspan="2">Funkcje</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($aUsers as $aOneUser) : ?>
            <tr>
                <td><?php echo $aOneUser['id'] ?></td>
                <td><?php echo $aOneUser['user_name'] ?></td>
                <td><?php echo $aOneUser['user_surname'] ?></td>
                <td><?php echo $aOneUser['email1'] ?></td>
                <td><?php echo $aOneUser['street'] ?></td>
                <td><?php echo $aOneUser['post_code'] ?></td>
                <td><?php echo $aOneUser['city'] ?></td>
                <td><a class="btn" href="<?php echo base_url().'admin/users_edit/'.$aOneUser['id'] ?>">Edytuj</a></td>
                <td>
                    <form class="deleteRecord" action="<?php echo base_url().'admin/users_delete' ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $aOneUser['id'] ?>" />
                        <input class="btn" type="submit" name="delete" value="Delete" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>