<h3>Lista ankiet</h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa ankiety</th>
            <th>Pytanie</th>
            <th>Aktywna</th>
            <th colspan="3">Funkcje</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($Surveys as $Key) : ?>
        <tr>
            <td><?php echo $Key['id'] ?></td>
            <td><?php echo $Key['survey_name'] ?></td>
            <td><?php echo $Key['question'] ?></td>
            <td><?php echo $Key['current'] ?></td>
            <td><a href="<?php echo base_url().'admin/show_survey_options/'.$Key['id'] ?>">Pokaż szczegóły</a></td>
            <td><a href="<?php echo base_url().'admin/survey_edit/'.$Key['id'] ?>">Edytuj</a></td>
            <td><a href="<?php echo base_url().'admin/survey_delete/'.$Key['id'] ?>">Usuń</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?php echo base_url().'admin/survey_add' ?>">Dodaj ankietę</a>