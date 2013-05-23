            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>
                              <?php echo form_open(render_url('admin/artists_edit/'.$aOne['id'],'')); ?>
                                    <?php if ($sMsg) : ?>
                                    <h4 class="text-success"><?php echo $sMsg ?></h4>
                                    <?php endif; ?>
                                    <p class="nagl">Edytowanie artysty</p>
                                    <div class ="surveysPadding">
                                        
                                        <p>Nazwa artysty</p>
                                        <?php echo form_error('artist_name'); ?>
                                        <input type="text" name="artist_name" value="<?php echo set_value('artist_name', $aOne['artist_name']); ?>" size="50" />

                                        <p>Nazwisko artysty (opcjonalnie)</p>
                                        <?php echo form_error('artist_surname'); ?>
                                        <input type="text" name="artist_surname" value="<?php echo set_value('artist_surname', $aOne['artist_surname']); ?>" size="50" />


                                        <div class="form-actions">
                                            <input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
                                            <input type="hidden" name="bProceed" value="1" />
                                            <button type="submit" class="btn btn-primary">Edytuj artystę</button>
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