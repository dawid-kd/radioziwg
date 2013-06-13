<div class="span9 bgblue span9-ext">
	<div class="row row-ext ">
		<div class="span8 span8-ext bgblue2">
			<div class="surveysPadding">
				<article>
					<p class="nagl">Weź udział w ankiecie</p>					
					<table class="table footable">
						<tbody>						
							<tr>
								<td>
									<p>Pytanie:</p>
									<?php echo $Survey['question'];?>
								</td>
							</tr>
							<tr>
								
							<?php if($enable):?>								
								<td><form action="<?php echo base_url().'users/show_survey'; ?>" method="post">
									<?php foreach ($Optionn as $Opt) : ?>
										<div class="control-group">
                                        	<label class="radio">
		                                    <input type="radio" name="optionsRadios" value="<?php echo $Opt['id']?>" checked>
                                          		<?php echo $Opt['option_name']?>
                                        	</label>
	                                   </div>
	                            	<?php endforeach; ?>
                                    <div class="form-actions">
                                        <input type="hidden" name="bProceed" value="1" />
                                        <input class="btn btn-warning" type="submit" value="Zagłosuj" />
                                    </div>
	                            </form>	  </td>                         
                            <?php endif; ?>
                            <?php if(!$enable): ?>
									<p>Wyniki ankiety</p>
									
	                            <table class="table footable">
	                            <thead>
                                  <tr>
                                    <th data-hide="expand">Nazwa opcji</th>
                                    <th data-hide="phone">Liczba głosów</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($Results as $Result) : ?>
							        <tr>
							            <td><?php echo $Result['option_name'] ?></td>
										<td><?php echo $Result['option_count'] ?></td>
							        </tr>
							       <?php endforeach; ?>                                                                                 
                                </tbody>
                                </table>
	                            
	                            
	                            
	                            
	                            
	                            
                            <?php endif; ?>
                            
                            </tr>
						</tbody>
					</table>
				</article>
			</div>
		</div>
	</div>
</div>