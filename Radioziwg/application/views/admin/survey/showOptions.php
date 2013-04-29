<h3>Ankieta</h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa ankiety</th>
            <th>Pytanie</th>
            <th>Aktywna</th>
            <th colspan="2">Funkcje</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><?php echo $Survey['id'] ?></td>
            <td><?php echo $Survey['survey_name'] ?></td>
            <td><?php echo $Survey['question'] ?></td>
            <td><?php echo $Survey['current'] ?></td>
            <td><a href="<?php echo base_url().'admin/survey_edit/'.$Survey['id'] ?>">Edytuj</a></td>
            <td><a href="<?php echo base_url().'admin/survey_delete/'.$Survey['id'] ?>">Usuń</a></td>
        </tr>
    </tbody>
</table>
<h3>Zestawienie opcji</h3>
<table class="table table-hover">
    <thead>
        <tr>
        	<th>ID</th>
            <th>Nazwa opcji</th>
            <th>Oddane głosy</th>
            <th colspan="2">Funkcje</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($Options as $Option) : ?>
        <tr>
            <td><?php echo $Option['id'] ?></td>
            <td><?php echo $Option['option_name'] ?></td>
			<td><?php echo $Option['option_count'] ?></td>
            <td><a href="<?php echo base_url().'admin/survey_option_edit/'.$Option['id'] ?>">Edytuj</a></td>
            <td><a href="<?php echo base_url().'admin/survey_option_delete/'.$Option['id'] ?>">Usuń</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h3>Dodawanie</h3>
<?php echo form_open(""); ?>
<h5>Nazwa opcji</h5>
<?php echo form_error('option_name'); ?>
<input type="text" name="option_name" value="" size="50" />
<div class='clearfix'></div>
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />
<?php echo form_close() ?>