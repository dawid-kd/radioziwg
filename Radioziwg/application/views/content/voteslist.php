<div class="span9 bgblue span9-ext">
	<div class="row row-ext ">
		<div class="span8 span8-ext bgblue2">
			<div class="surveysPadding">
				<article>
					<p class="nagl">
						Głosowania
					</p>					
					<div class="buttonaddadmin">
						<a href="<?php echo base_url().'admin/vote_add'?>">
							<button class="btn btn-success" data-toggle="button" id="Button7">Dodaj głosowanie</button>
						</a>	
					</div>
					<table class="table">
						<thead>
							<tr>
								<th>L.p.</th>
					            <th>Nazwa głosowania</th>
					            <th>Opis</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($Votes as $Key) : ?>	
							<tr>
								<td><?php echo $Key['id'] ?></td>
					            <td><?php echo $Key['vote_name'] ?></td>
					            <td><?php echo $Key['description'] ?></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="5" class="buttonsalign">
									<input type="checkbox">
									<a href="<?php echo base_url().'admin/show_vote_songs/'.$Key['id'] ?>">
										<button class="btn btn-info" data-toggle="button" id="Button4">Szczegóły</button>
									</a>
									<a href="<?php echo base_url().'admin/vote_edit/'.$Key['id'] ?>">
										<button class="btn btn-warning" data-toggle="button" id="Button1">Edytuj</button>
									</a>
									<a href="<?php echo base_url().'admin/vote_delete/'.$Key['id'] ?>">
										<button class="btn btn-danger" data-toggle="button" id="Button2">Usuń</button>
									</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</article>
			</div>
		</div>
	</div>
</div>
</div>
</div>
