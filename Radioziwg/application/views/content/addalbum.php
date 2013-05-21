            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>    
                            <form action="<?php echo base_url().'admin/albums_add/'?>" method="post">
                                <p class="nagl">Dodawanie albumu</p>
                                <div class ="surveysPadding">
                                    <p>Nazwa albumu</p>
                                    <?php echo form_error('album_name'); ?>
                                    <input type="text" name="album_name" maxlength="255" placeholder="Radio" style="width:250px" value="<?php echo set_value('album_name'); ?>" />
                                    <div class="form-actions">
                                        <input type="hidden" name="bProceed" value="1" />
                                        <input class="btn btn-primary" type="submit" value="Dodaj album" />
                                    </div>
                                </div>
                            </form>
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
 