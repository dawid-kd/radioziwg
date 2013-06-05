<div class="span9 bgblue span9-ext">
	<div class="row row-ext ">
		<div class="span5 span5-ext bgblue2">
			<div class="surveysPadding">
				<article>
					<p class="nagl">Weź udział w konkursie</p>					
					<table class="table footable">
						<tbody>						
							<tr>
								<td>
									<p>Pytanie:</p>
									<?php echo $Competition['question']; ?>
								</td>
							</tr>
							<tr>
							<?php if($enable):?>
								<td>
									<form action="<?php echo base_url().'users/competition_answere/'.$Competition['id']; ?>" method="post">
	                                    <label class="control-label" for="a2">Twoja odpowiedź</label>
	                                    <div class="control-group">
	                                  	  	<?php echo form_error('answer'); ?>                       
	                                    	<textarea rows="3" id="a2" name="answer" placeholder="Odpowiedź"></textarea>
	                                    </div>
	                                    <div class="form-actions">
	                                    	<input type="hidden" name="competition_id" value="<?php echo $Competition['question']; ?>" />
	                                        <input type="hidden" name="bProceed" value="1" />
	                                        <input class="btn btn-warning" type="submit" value="Wyślij odpowiedź" />
	                                    </div>
	                            	</form>
	                            </td>
                            <?php endif; ?>
                            <?php if(!$enable): ?>
								<td>
									<p>Twoja odpowiedź</p>
									<textarea rows="3" disabled=""><?php echo $answer['answer']; ?></textarea>
	                            </td>
                            <?php endif; ?>
							</tr>
						</tbody>
					</table>
				</article>
			</div>
		</div>
	</div>
</div>