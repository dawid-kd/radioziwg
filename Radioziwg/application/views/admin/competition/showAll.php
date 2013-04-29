<h3>Lista konkursów</h3>
<h>
	<a href="<?php echo base_url().'admin/compet_add'?>">Dodaj konkurs</a>
	<?php switch($Active): 
		case 0: ?>
			<a href="<?php echo base_url().'admin/show_all_compet'?>">Pokaż wszystkie</a>
		<?php break;?>
		<?php case 1: ?>
			<a href="<?php echo base_url().'admin/show_active_compet'?>">Pokaż tylko aktywne</a>
		<?php break;?>
	<?php endswitch;?>
</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa konkursu</th>
                <th>Opis</th>
                <th>Początek konkursu</th>    
                <th>Koniec konkursu</th>    
                <th>Pytanie konkursowe</th>    
                <th>Aktywne</th>
                <th colspan="3">Funkcje</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($Competitions as $Key) : ?>
            <tr>
                <td><?php echo $Key['id'] ?></td>
                <td><?php echo $Key['competition_name'] ?></td>
                <td><?php echo $Key['description'] ?></td>
                <td><?php echo $Key['start_date'] ?></td>
                <td><?php echo $Key['end_date'] ?></td>
                <td><?php echo $Key['question'] ?></td>
                <td><?php echo $Key['current'] ?></td>
                <td><a href="<?php echo base_url().'admin/compet_answers/'.$Key['id'] ?>">Pokaż odpowiedzi</a></td>
                <td><a href="<?php echo base_url().'admin/compet_edit/'.$Key['id'] ?>">Edytuj</a></td>
                <td><a href="<?php echo base_url().'admin/compet_delete/'.$Key['id'] ?>">Usuń</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>