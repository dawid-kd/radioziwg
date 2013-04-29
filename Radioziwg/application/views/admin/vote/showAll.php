<h3>Lista głosowań</h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa głosowania</th>
            <th>Opis</th>
            <th colspan="3">Funkcje</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($Votes as $Key) : ?>
        <tr>
            <td><?php echo $Key['id'] ?></td>
            <td><?php echo $Key['vote_name'] ?></td>
            <td><?php echo $Key['description'] ?></td>
            <td><a href="<?php echo base_url().'admin/show_vote_songs/'.$Key['id'] ?>">Pokaż szczegóły</a></td>
            <td><a href="<?php echo base_url().'admin/vote_edit/'.$Key['id'] ?>">Edytuj</a></td>
            <td><a href="<?php echo base_url().'admin/vote_delete/'.$Key['id'] ?>">Usuń</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?php echo base_url().'admin/vote_add' ?>">Dodaj głosowanie</a>