<div class="span9 bgblue span9-ext">
    <div class="row row-ext ">
        <div class="span8 span8-ext bgblue2">
            <div class="surveysPadding">
                <article>
                    <p class="nagl"> Konkursy</p>
                    <table class="table footable">
						<thead>
							<tr>
								<th data-hide="phone">L.p.</th>
								<th data-hide="expand">Nazwa</th>
								<th data-hide="phone">Opis</th>
								<th data-hide="phone">Początek</th>
								<th data-hide="phone">Koniec</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($ACompetitions as $Key) : ?>	
							<tr>
								<td><?php echo $Key['id'] ?></td>
								<td><?php echo $Key['competition_name'] ?></td>
								<td><?php echo $Key['description'] ?></td>
								<td><?php echo $Key['start_date'] ?></td>
								<td><?php echo $Key['end_date'] ?></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="5">
									<p>Pytanie:</p>
									<?php echo $Key['question']; ?>
								</td>
							</tr>
							<tr>
								<td colspan="5" class="buttonsalign">
									<a href="<?php echo base_url().'users/competition_answer/'.$Key['id'] ?>">
										<button class="btn btn-info" data-toggle="button" id="Button4">Odpowiedz na pytanie</button>
									</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					</div>
                </article>
            </div>
        </div>
    </div>