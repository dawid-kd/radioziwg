            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <?php echo form_open(render_url('admin/'.$sModuleName.'_add','')); ?>
                          <article>                             
                             <p class="nagl">Dodawanie radia</p>
                              <div class ="surveysPadding">
                                    <p>Nazwa radia</p>
                                    <?php echo form_error($sModuleName.'_name'); ?>
                                    <input type="text" name="<?php echo $sModuleName ?>_name" value="" size="50" />

                                    <div class="buttonaddadmin">
                                      <button type="button" class="btn btn-primary" id="addGenre">Dodaj gatunek</button>
                                    </div>

                                    <div id="genreList">
                                        <p class="nagl">Gatunki radia</p>
                                        <div id="genreSelect">
                                            <select name="aGenreIds[]">
                                                <?php foreach ($aGenres as $aOneGenre) : ?>
                                                <option value="<?php echo $aOneGenre['id'] ?>"><?php echo $aOneGenre['name_genre'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>


                                    <div class="form-actions">
                                        <input type="hidden" name="bProceed" value="1" />
                                        <button type="submit" class="btn btn-primary">Dodaj radio</button>
                                    </div>
                              
                              </div>
                          </article> 
                        </form>
                      </div>
                      </div> 
                </div>                
            </div>
            </div>
       </div>