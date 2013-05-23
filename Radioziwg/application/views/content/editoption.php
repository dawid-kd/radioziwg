            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <form action="<?php echo base_url().'admin/survey_option_edit/'.$Option['id']; ?>" method="post">                     
                             <p class="nagl">Edytowanie opcji</p>
                              <div class ="surveysPadding">
                               <p>Nazwa opcji</p>
                               <input type="text" name="option_name" value="<?php echo set_value('option_name', $Option['option_name']); ?>" maxlength="255" placeholder="Radio" style="width:250px" />
                              <div class="form-actions">
                              	<input type="hidden" name="id_survey" value="<?php echo $Survey['id'] ?>" />
                              	<input type="hidden" name="id" value="<?php echo $Option['id'] ?>" />
                              	<input type="hidden" name="bProceed" value="1" />
                                <button type="submit" class="btn btn-primary">Zatwierdź zmiany</button>
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
