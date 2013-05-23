            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <p class="nagl">Lista albumów</p>
                              <div class="buttonaddadmin">
                                 <a href="<?php echo render_url('admin/albums_add',''); ?>"><button class="btn btn-success" data-toggle="button" id="Button7">Dodaj nowy album</button></a>
                             </div>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>L.p.</th>
                                    <th>Nazwa albumu</th>
                                    <th>Edycja albumu</th>
                                    <th>Usuwanie albumu</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($aList as $aOne) : ?>
                                    <tr>
                                        <td><?php echo $aOne['id'] ?></td>
                                        <td><?php echo $aOne['album_name'] ?></td>
                                        <td><a class="btn btn-warning" href="<?php echo render_url('admin/albums_edit/'.$aOne['id'],''); ?>">Edytuj</a></td>
                                        <td>
                                            <form class="deleteRecord" action="<?php echo render_url('admin/albums_delete',''); ?>" method="post">
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