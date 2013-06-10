<div class="span9 bgblue span9-ext">
	<div class="row row-ext ">
		<div class="span8 span8-ext bgblue2">
			<div class="surveysPadding">
				<article>
					<p class="nagl">
						Głosowania
					</p>	
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
									<a href="<?php echo base_url().'users/show_vote_songs/'.$Key['id'] ?>">
										<button class="btn btn-info" data-toggle="button" id="Button4">Szczegóły</button>
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
