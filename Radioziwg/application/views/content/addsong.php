            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>  
                              <?php echo form_open(render_url('admin/songs_add','')); ?>
                                <p class="nagl">Dodawanie nowego utworu</p>
                                <div class ="surveysPadding">
                                <p>Nazwa utworu</p>
                                <?php echo form_error('song_name'); ?>
                                <input type="text" name="song_name" value="" size="50" />
                                
                                <p>Album</p>
                                <select name="id_album" class="span2">
                                    <?php foreach ($aAlbums as $aOneAlbum) : ?>
                                    <option value="<?php echo $aOneAlbum['id'] ?>"><?php echo $aOneAlbum['album_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                
                                <p>Wykonawca</p>
                                <select name="id_artist" class="span2">
                                    <?php foreach ($aArtists as $aOneArtist) : ?>
                                    <option value="<?php echo $aOneArtist['id'] ?>"><?php echo $aOneArtist['artist_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                
                                <div class="buttonaddadmin">
                                   <button type="button" class="btn btn-primary" id="addGenre">Dodaj gatunek</button>
                                </div>
                                
                                <div id="genreList">
                                    <p>Gatunki radia</p>
                                    <div id="genreSelect">
                                        <select name="aGenreIds[]" class="span2">
                                            <?php foreach ($aGenres as $aOneGenre) : ?>
                                            <option value="<?php echo $aOneGenre['id'] ?>"><?php echo $aOneGenre['name_genre'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="bProceed" value="1" />
                                
                                <div class="form-actions">
                                  <button type="submit" class="btn btn-primary">Dodaj utwór</button>
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