<div class="span9 bgblue span9-ext">
	<div class="row row-ext ">
		<div class="span8 span8-ext bgblue2">
			<div class="surveysPadding">
				<article>
					<p class="nagl">
						Głosowanie
					</p>	
					<div class="buttonaddadmin">
	                     <a href="<?php echo base_url().'admin/show_all_votes'; ?>">
							<button class="btn btn-info" data-toggle="button" id="Button3">Pokaż wszystkie</button>
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
							<tr>
								<td><?php echo $Vote['id'] ?></td>
					            <td><?php echo $Vote['vote_name'] ?></td>
					            <td><?php echo $Vote['description'] ?></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="5" class="buttonsalign">
									<input type="checkbox">
									<a href="<?php echo base_url().'admin/vote_edit/'.$Vote['id'] ?>">
										<button class="btn btn-warning" data-toggle="button" id="Button1">Edytuj</button>
									</a>
									<a href="<?php echo base_url().'admin/vote_delete/'.$Vote['id'] ?>">
										<button class="btn btn-danger" data-toggle="button" id="Button2">Usuń</button>
									</a>
								</td>
							</tr>
							<tr><td colspan="5"></td></tr>
							<tr>	
								<td colspan="5">Zestawienie tytułów</td>																
							</tr>
							<tr>
					            <th>ID</th>   
					            <th>Tytuł piosenki</th>
					            <th>Oddane głosy</th>
					            <th>Usuń piosenkę</th>
					        </tr>
					        <?php foreach ($Songs as $Song) : ?>
						        <tr>
						            <td><?php echo $Song['id'] ?></td>
						            <td><?php foreach ($SongsNames as $SongName){
						            			 if($Song['id_song']==$SongName['id']) 
						            			 	echo $SongName['song_name']; 
										};?></td>
									<td><?php echo $Song['votes_count'] ?></td>
						            <td>
						            	<a href="<?php echo base_url().'admin/vote_song_delete/'.$Song['id'] ?>">
											<button class="btn btn-danger" data-toggle="button" id="Button2">Usuń</button>
										</a>
									</td>
						        </tr>
						   	<?php endforeach; ?>
							<tr>
								<td colspan="5">Dodaj utwór</td>
							</tr>
							<tr>
								<td colspan="5">
								<form action="<?php echo base_url().'admin/show_vote_songs/'.$Vote['id']?>" method="post">
	                                
	                                    <label class="control-label" for="a1">Nazwa utworu</label>
	                                    <?php $options; foreach($SongsNames as $SongName){
												$options[$SongName['id']] = $SongName['song_name'];
										}; 
										echo form_dropdown('songs', $options, set_value('1'),'id="a1"'); ?> 
	                                    <div class="form-actions">
	                                        <input type="hidden" name="bProceed" value="1" />
	                                        <input class="btn btn-primary" type="submit" value="Dodaj do głosowania" />
	                                    </div>
	                                
	                            </form>
	                           </td>
							</tr>
						</tbody>
					</table>
				</article>
			</div>
		</div>
	</div>
</div>
</div>
</div>
