            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <?php echo form_open(render_url('admin/'.$sModuleName.'_edit/'.$aOne['id'],'')); ?>
                          <article>  
                            <?php if ($sMsg) : ?>
                            <h4 class="text-success"><?php echo $sMsg ?></h4>
                            <?php endif; ?>
                            
                             <p class="nagl">Edycja radia</p>
                            <div class ="surveysPadding">
                               
                                <p>Nazwa radia</p>
                                <?php echo form_error($sModuleName.'_name'); ?>
                                <input type="text" name="<?php echo $sModuleName ?>_name" value="<?php echo set_value($sModuleName.'_name', $aOne[$sModuleName.'_name']); ?>" size="50" />

                                <div class="buttonaddadmin">
                                    <button type="button" class="btn btn-primary" id="addGenre">Dodaj gatunek</button>
                                </div>
                               
                                <div id="genreList">
                                    <p class="nagl">Gatunki radia</p>
                                        <?php if ($aOne['aGenre']) : ?>
                                            <?php foreach($aOne['aGenre'] as $key => $val) : ?>
                                                <?php if ($key == 0) : ?>
                                                    <div id="genreSelect">
                                                        <select name="aGenreIds[]">
                                                            <?php foreach ($aGenres as $aOneGenre) : ?>
                                                            <option value="<?php echo $aOneGenre['id'] ?>" <?php if($aOneGenre['name_genre'] == $val) : ?> selected="selected" <?php endif; ?>><?php echo $aOneGenre['name_genre'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <button type="button" class="btn btn-danger" id="deleteGenre">Usuń gatunek</button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                <?php else : ?>
                                                    <select name="aGenreIds[]">
                                                        <?php foreach ($aGenres as $aOneGenre) : ?>
                                                        <option value="<?php echo $aOneGenre['id'] ?>" <?php if($aOneGenre['name_genre'] == $val) : ?> selected="selected" <?php endif; ?>><?php echo $aOneGenre['name_genre'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <button type="button" class="btn btn-danger" id="deleteGenre">Usuń gatunek</button>
                                                    <div class="clearfix"></div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <div id="genreSelect">
                                                <select name="aGenreIds[]">
                                                    <?php foreach ($aGenres as $aOneGenre) : ?>
                                                    <option value="<?php echo $aOneGenre['id'] ?>"><?php echo $aOneGenre['name_genre'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <button type="button" class="btn btn-danger" id="deleteGenre">Usuń gatunek</button>
                                                <div class="clearfix"></div>
                                            </div>
                                        <?php endif; ?>
                                </div>
                                
                                <div class="form-actions">
                                    <input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
                                    <input type="hidden" name="bProceed" value="1" />
                                    <button type="submit" class="btn btn-primary">Edytuj radio</button>
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