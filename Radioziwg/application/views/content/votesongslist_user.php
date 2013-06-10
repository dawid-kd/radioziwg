<div class="span9 bgblue span9-ext">
	<div class="row row-ext ">
		<div class="span8 span8-ext bgblue2">
			<div class="surveysPadding">
				<article>
					<p class="nagl">
						Głosowanie
					</p>	
					<div class="buttonaddadmin">
	                     <a href="<?php echo base_url().'users/show_all_votes'; ?>">
							<button class="btn btn-info" data-toggle="button" id="Button3">Pokaż wszystkie</button>
						</a>
	                 </div>				
					<table class="table footable">
						<thead>
							<tr>
								<th data-hide="phone">L.p.</th>
					            <th data-hide="expand">Nazwa głosowania</th>
					            <th data-hide="phone">Opis</th>
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
							<tr><td colspan="5"></td></tr>
							<tr>	
								<td colspan="5">Zestawienie tytułów</td>																
							</tr>
							<tr>
					            <th>ID</th>   
					            <th>Tytuł piosenki</th>
					            <th>Oddane głosy</th>
					            <th>Zagłosuj</th>
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
                                                                <form action="<?php echo base_url().'users/show_vote_songs/'.$Vote['id'] ?>" method="post">
<!--                                                                    <a href="<?php echo base_url().'users/show_vote_song/'.$Song['id'] ?>">
											<button class="btn btn-success" data-toggle="button" id="Button2">Zagłosuj</button>
                                                                    </a>-->
                                                                    <input type="hidden" name="song" value="<?php echo $Song['id'];?>" />
                                                                    <?php if (isset($aUserVote)) : ?>
                                                                        <?php if ($Song['id'] == $aUserVote['id_song']) : ?>
                                                                        <button class="btn btn-info" type="button">Wybrano</button>
                                                                        <?php else : ?>
                                                                        <button class="btn btn-success" type="submit">Zmień</button>
                                                                        <input type="hidden" name="change" value="1" />
                                                                        <?php endif; ?>
                                                                    <?php else : ?>
                                                                    <button class="btn btn-success" type="submit">Zagłosuj</button>
                                                                    <?php endif; ?>
                                                                </form>
                                                                    
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