
            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <?php echo form_open(render_url('admin/artists_add','')); ?>
                          <article>                             
                             <p class="nagl">Dodawanie artysty</p>
                              <div class ="surveysPadding">
                                  
                               <p>Nazwa artysty</p>
                               <?php echo form_error('artist_name'); ?>
                               <input type="text" name="artist_name" value="<?php echo set_value('artist_name'); ?>" size="50" />
                               
                               <p>Nazwisko artysty (opcjonalnie)</p>
                               <?php echo form_error('artist_surname'); ?>
                               <input type="text" name="artist_surname" value="<?php echo set_value('artist_surname'); ?>" size="50" />
                               
                              <div class="form-actions">
                                  <input type="hidden" name="bProceed" value="1" />
                                  <button type="submit" class="btn btn-primary">Dodaj artystę</button>
                              </div>
                              </div>
                          </article>   
                        </form>
                      </div>
                      </div> 
                </div>                
            </div>