            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <p class="nagl">Lista utworów</p>
                              <div class="buttonaddadmin">
                                 <a href="<?php echo render_url('admin/songs_add',''); ?>"><button class="btn btn-success" data-toggle="button" id="Button7">Dodaj nowy utwór</button></a>
                             </div>
                              <table class="table footable">
                                <thead>
                                  <tr>
                                    <th data-hide="phone">ID</th>
                                    <th data-hide="expand">Nazwa utworu</th>
                                    <th data-hide="phone">Album</th>
                                    <th data-hide="phone">Wykonawca</th>
                                    <th data-hide="phone">Edytowanie</th>
                                    <th data-hide="phone">Usuwanie</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($aList as $aOne) : ?>
                                    <tr>
                                        <td><?php echo $aOne['id'] ?></td>
                                        <td><?php echo $aOne['song_name'] ?></td>
                                        <td><?php echo $aOne['album_name'] ?></td>
                                        <td><?php echo $aOne['artist_name'] ?></td>
                                        <td><a class="btn btn-warning" href="<?php echo render_url('admin/songs_edit/'.$aOne['id'],''); ?>">Edytuj</a></td>
                                        <td>
                                            <form class="deleteRecord" action="<?php echo render_url('admin/songs_delete',''); ?>" method="post">
                                                <input type="hidden" name="id" value="<?php echo $aOne['id'] ?>" />
                                                <input class="btn btn-danger" type="submit" name="delete" value="Usuń" />
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                              </table> 
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
            </div>
       </div>