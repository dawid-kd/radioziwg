            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>        
                          	<form action="<?php echo base_url().'admin/vote_edit/'.$Vote['id']; ?>" method="post">                     
                             <p class="nagl">Edytowanie głosowania</p>
                              <div class ="surveysPadding">
                              		<?php if ($sMsg) : ?>
                                        <h4 class="text-success"><?php echo $sMsg ?></h4>
                                    <?php endif; ?>
                                    <label class="control-label" for="a1">Nazwa głosowania</label>
                                    <?php echo form_error('vote_name'); ?>
                                    <input type="text" name="vote_name" value="<?php echo set_value('vote_name', $Vote['vote_name']); ?>" maxlength="255" placeholder="Nazwa" style="width:250px" id="a1"/>
                                    <label class="control-label" for="a2">Opis</label>
                                    <div class="control-group">
                                  	  	<?php echo form_error('description'); ?>                       
                                    	<textarea rows="3" id="a2" name="description" placeholder="Opis"><?php echo set_value('description', $Vote['description']); ?></textarea>
                                    </div>                                    
                                    <div class="form-actions">
                                    	<input type="hidden" name="id" value="<?php echo $Vote['id'] ?>" />
                                        <input type="hidden" name="bProceed" value="1" />
                                        <input class="btn btn-primary" type="submit" value="Zatwierdź zmiany" />
                                    </div>
                                </div>
                             </form>
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
            </div>
       </div>