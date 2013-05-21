            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>
                            <form action="<?php echo base_url().'admin/albums_edit/'.$aOne['id']?>" method="post">
                                <p class="nagl">Edytowanie albumu</p>
                                <div class ="surveysPadding">
                                    <?php if ($sMsg) : ?>
                                        <h4 class="text-success"><?php echo $sMsg ?></h4>
                                    <?php endif; ?>
                                    <p>Nazwa albumu</p>
                                    <?php echo form_error('album_name'); ?>
                                    <input type="text" name="album_name" maxlength="255" placeholder="Radio" style="width:250px" value="<?php echo set_value('album_name', $aOne['album_name']); ?>"/>
                                    <div class="form-actions">
                                        <input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
                                        <input type="hidden" name="bProceed" value="1" />
                                        <input class="btn btn-primary" type="submit" value="Edytuj album" />
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