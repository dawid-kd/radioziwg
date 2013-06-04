            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <p class="nagl">Lista artystów</p>
                              <div class="buttonaddadmin">
                                 <a href="<?php echo render_url('admin/artists_add','') ?>"><button class="btn btn-success" data-toggle="button" id="Button7">Dodaj nowego artystę</button></a>
                             </div>
                              <table class="table footable">
                                <thead>
                                  <tr>
                                    <th data-hide="phone">ID</th>
                                    <th data-hide="expand">Nazwa/Imię artysty</th>
                                    <th data-hide="phone">Nazwisko artysty</th>
                                    <th data-hide="phone">Edycja artysty</th>
                                    <th data-hide="phone">Usuwanie artysty</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($aList as $aOne) : ?>
                                    <tr>
                                        <td><?php echo $aOne['id'] ?></td>
                                        <td><?php echo $aOne['artist_name'] ?></td>
                                        <td><?php echo $aOne['artist_surname'] ?></td>
                                        <td><a class="btn btn-warning" href="<?php echo render_url('admin/artists_edit/'.$aOne['id'],''); ?>">Edytuj</a></td>
                                        <td>
                                            <form class="deleteRecord" action="<?php echo render_url('admin/artists_delete',''); ?>" method="post">
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