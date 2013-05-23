            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article> 
                          	<form action="<?php echo base_url().'admin/compet_add/'?>" method="post">
                                <p class="nagl">Dodawanie konkursu</p>
                                <div class ="surveysPadding">
                                    <label class="control-label" for="a1">Nazwa konkursu</label>
                                    <?php echo form_error('competition_name'); ?>
                                    <input type="text" name="competition_name" maxlength="255" placeholder="Nazwa" style="width:250px" id="a1"/>
                                    <label class="control-label" for="a2">Opis</label>
                                    <div class="control-group">
                                  	  	<?php echo form_error('description'); ?>                       
                                    	<textarea rows="3" id="a2" name="description" placeholder="Opis"></textarea>
                                    </div>
                                    <label class="control-label" for="a3">Początek konkursu</label>
                                    <div class="control-group">
	                                    <?php echo form_error('start_date'); ?>
	                                    <input type="text" id="a3" name="start_date" maxlength="255" style="width:250px" value="<?php $now = new DateTime(); echo $now->format('Y-m-d H:i:s');?>"/>
                                    </div>
                                    <label class="control-label" for="a4">Koniec konkursu</label>
                                    <div class="control-group">
	                                    <?php echo form_error('end_date'); ?>
	                                    <input type="text" id="a4" name="end_date" maxlength="255" style="width:250px" value="<?php $date = new DateTime(); $date->modify('+7 day'); echo $date->format('Y-m-d H:i:s'); ?>"/>
                                    </div>
                                    <label class="control-label" for="a5">Pytanie konkursowe</label>
                                    <div class="control-group">
	                                    <?php echo form_error('question'); ?>
	                                    <textarea rows="3" id="a5" name="question" placeholder="Pytanie"></textarea>
                                    </div>
                                    <label class="checkbox">
                                 		<input type="checkbox" name="current" value="T"> Oznacz konkurs jako aktywny, aby użytkownicy mogli brać udział
                                	</label>
                                    <div class="form-actions">
                                        <input type="hidden" name="bProceed" value="1" />
                                        <input class="btn btn-primary" type="submit" value="Dodaj konkurs" />
                                    </div>
                                </div>
                            </form>
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
