            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>    
                          	<form action="<?php echo base_url().'admin/survey_edit/'.$Survey['id']; ?>" method="post">                                          
                             <p class="nagl">Edytowanie ankiety</p>
                              		<?php if ($sMsg) : ?>
                                        <h4 class="text-success"><?php echo $sMsg ?></h4>
                                    <?php endif; ?>
                                    <label class="control-label" for="a1">Nazwa ankiety</label>
	                                    <?php echo form_error('survey_name'); ?>
	                                    <input type="text" name="survey_name" value="<?php echo set_value('survey_name', $Survey['survey_name']); ?>" maxlength="255" placeholder="Nazwa" style="width:250px" id="a1"/>
                                    <label class="control-label" for="a2">Pytanie ankiety</label>
                                    <div class="control-group">
                                  	  	<?php echo form_error('question'); ?>                       
                                    	<textarea rows="3" id="a2" name="question" placeholder="Opis"><?php echo set_value('question', $Survey['question']); ?></textarea>
                                    </div>
                                    <label class="checkbox">
                                 		<input type="checkbox" name="current" value="T" <?php if($Survey['current']=="T"){echo 'checked="checked"';} ?> /> Oznacz konkurs jako aktywny, aby użytkownicy mogli brać udział
                                	</label>
                                    <div class="form-actions">
                                    	<input type="hidden" name="id" value="<?php echo $Survey['id'] ?>" />
                                        <input type="hidden" name="bProceed" value="1" />
                                        <input class="btn btn-primary" type="submit" value="Zatwierdź zmiany" />
                                    </div>
                             </form>                     
                              </div>
                            </div>
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
            </div>
       </div>