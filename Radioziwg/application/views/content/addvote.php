            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article> 
                          	<form action="<?php echo base_url().'admin/vote_add'?>" method="post">
                                <p class="nagl">Dodawanie głosowania</p>
                                <div class ="surveysPadding">
                                    <label class="control-label" for="a1">Nazwa głosowania</label>
                                    <?php echo form_error('vote_name'); ?>
                                    <input type="text" name="vote_name" maxlength="255" placeholder="Nazwa" style="width:250px" id="a1"/>
                                    <label class="control-label" for="a2">Opis</label>
                                    <div class="control-group">
                                  	  	<?php echo form_error('description'); ?>                       
                                    	<textarea rows="3" id="a2" name="description" placeholder="Opis"></textarea>
                                    </div>                                    
                                    <div class="form-actions">
                                        <input type="hidden" name="bProceed" value="1" />
                                        <input class="btn btn-primary" type="submit" value="Dodaj głosowanie" />
                                    </div>
                                </div>
                            </form>
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
