<table class="table table-hover">
    <thead>
        <tr>
            <th>Nazwa konkursu</th>
            <th>Opis</th>
            <th>Początek konkursu</th>    
            <th>Koniec konkursu</th>    
            <th>Pytanie konkursowe</th>    
            <th>Aktywne</th>
            <th colspan="2">Funkcje</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><?php echo $Competition['competition_name'] ?></td>
            <td><?php echo $Competition['description'] ?></td>
            <td><?php echo $Competition['start_date'] ?></td>
            <td><?php echo $Competition['end_date'] ?></td>
            <td><?php echo $Competition['question'] ?></td>
            <td><?php echo $Competition['current'] ?></td>
            <td><a href="<?php echo base_url().'admin/compet_edit/'.$Competition['id'] ?>">Edytuj</a></td>
            <td><a href="<?php echo base_url().'admin/compet_delete/'.$Competition['id'] ?>">Usuń</a></td>
        </tr>
    </tbody>
</table>
<h3>Lista odpowiedzi</h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>   
            <th>Użytkownik</th>
            <th>Odpowiedź</th>
            <th>Opcje</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($Answers as $Key) : ?>
        <tr>
            <td><?php echo $Key['id'] ?></td>
            <td><?php echo $Key['user'] ?></td>
            <td><?php echo $Key['answer'] ?></td>
            <td><a href="<?php echo base_url().'admin/answer_delete/'.$Key['id'] ?>">Usuń</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>