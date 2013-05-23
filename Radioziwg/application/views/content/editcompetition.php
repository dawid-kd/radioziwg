            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>        
                          	<form action="<?php echo base_url().'admin/compet_edit/'.$Competition['id']; ?>" method="post">                     
                             <p class="nagl">Edytowanie konkursu</p>
                              <div class ="surveysPadding">
                              		<?php if ($sMsg) : ?>
                                        <h4 class="text-success"><?php echo $sMsg ?></h4>
                                    <?php endif; ?>
                                    <label class="control-label" for="a1">Nazwa konkursu</label>
                                    <?php echo form_error('competition_name'); ?>
                                    <input type="text" name="competition_name" value="<?php echo set_value('competition_name', $Competition['competition_name']); ?>" maxlength="255" placeholder="Nazwa" style="width:250px" id="a1"/>
                                    <label class="control-label" for="a2">Opis</label>
                                    <div class="control-group">
                                  	  	<?php echo form_error('description'); ?>                       
                                    	<textarea rows="3" id="a2" name="description" placeholder="Opis"><?php echo set_value('description', $Competition['description']); ?></textarea>
                                    </div>
                                    <label class="control-label" for="a3">Początek konkursu</label>
                                    <div class="control-group">
	                                    <?php echo form_error('start_date'); ?>
	                                    <input type="text" id="a3" name="start_date" value="<?php echo set_value('start_date', $Competition['start_date']); ?>" maxlength="255" style="width:250px"/>
                                    </div>
                                    <label class="control-label" for="a4">Koniec konkursu</label>
                                    <div class="control-group">
	                                    <?php echo form_error('end_date'); ?>
	                                    <input type="text" id="a4" name="end_date" value="<?php echo set_value('end_date', $Competition['end_date']); ?>" maxlength="255" style="width:250px"/>
                                    </div>
                                    <label class="control-label" for="a5">Pytanie konkursowe</label>
                                    <div class="control-group">
	                                    <?php echo form_error('question'); ?>
	                                    <textarea rows="3" id="a5" name="question" placeholder="Pytanie"><?php echo set_value('question', $Competition['question']); ?></textarea>
                                    </div>
                                    <label class="checkbox">
                                 		<input type="checkbox" name="current" value="T" <?php if($Competition['current']=="T"){echo 'checked="checked"';} ?> /> Oznacz konkurs jako aktywny, aby użytkownicy mogli brać udział
                                	</label>
                                    <div class="form-actions">
                                    	<input type="hidden" name="id" value="<?php echo $Competition['id'] ?>" />
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