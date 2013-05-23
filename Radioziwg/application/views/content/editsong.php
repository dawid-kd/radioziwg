            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>
                                <?php echo form_open(render_url('admin/songs_edit/'.$aOne['id'],'')); ?>
                                <p class="nagl">Edytowanie utworu</p>
                                <?php if ($sMsg) : ?>
                                <h4 class="text-success"><?php echo $sMsg ?></h4>
                                <?php endif; ?>
                                <div class ="surveysPadding">
                                    <p>Nazwa utworu</p>
                                    <?php echo form_error('song_name'); ?>
                                    <input type="text" name="song_name" value="<?php echo set_value('song_name', $aOne['song_name']); ?>" size="50" />
                                    
                                    <p>Album</p>
                                    <select name="id_album" class="span2">
                                        <?php foreach ($aAlbums as $aOneAlbum) : ?>
                                        <option value="<?php echo $aOneAlbum['id'] ?>" <?php if( $aOne['id_album'] == $aOneAlbum['id']): ?> selected="selected" <?php endif; ?>><?php echo $aOneAlbum['album_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                   
                                    <p>Wykonawca</p>
                                    <select name="id_artist" class="span2">
                                        <?php foreach ($aArtists as $aOneArtist) : ?>
                                        <option value="<?php echo $aOneArtist['id'] ?>" <?php if( $aOne['id_artist'] == $aOneArtist['id']): ?> selected="selected" <?php endif; ?>><?php echo $aOneArtist['artist_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                    <div class="buttonaddadmin">
                                      <button type="button" class="btn btn-primary" id="addGenre">Dodaj gatunek</button>
                                    </div>
                                   
                                    <div id="genreList">
                                        <p>Gatunki radia</p>
                                            <?php if ($aOne['aGenre']) : ?>
                                                <?php foreach($aOne['aGenre'] as $key => $val) : ?>
                                                    <?php if ($key == 0) : ?>
                                                        <div id="genreSelect">
                                                            <select name="aGenreIds[]">
                                                                <?php foreach ($aGenres as $aOneGenre) : ?>
                                                                <option value="<?php echo $aOneGenre['id'] ?>" <?php if($aOneGenre['name_genre'] == $val) : ?> selected="selected" <?php endif; ?>><?php echo $aOneGenre['name_genre'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <button type="button" class="btn btn-danger" id="deleteGenre">Usuń</button>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    <?php else : ?>
                                                        <select name="aGenreIds[]">
                                                            <?php foreach ($aGenres as $aOneGenre) : ?>
                                                            <option value="<?php echo $aOneGenre['id'] ?>" <?php if($aOneGenre['name_genre'] == $val) : ?> selected="selected" <?php endif; ?>><?php echo $aOneGenre['name_genre'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <button type="button" class="btn btn-danger" id="deleteGenre">Usuń</button>
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
                                                    <button type="button" class="btn btn-danger" id="deleteGenre">Usuń</button>
                                                    <div class="clearfix"></div>
                                                </div>
                                            <?php endif; ?>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
                                        <input type="hidden" name="bProceed" value="1" />
                                        <button type="submit" class="btn btn-primary">Edytuj utwór</button>
                                    </div>
                                </div>
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
            </div>
       </div>