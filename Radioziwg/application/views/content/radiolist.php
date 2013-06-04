            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <p class="nagl">Radia</p>
                              <div class="buttonaddadmin">
                                 <a href="<?php echo render_url('admin/'.$sModuleName.'_add',''); ?>"><button class="btn btn-success" data-toggle="button" id="Button7">Dodaj nowe radio</button></a>
                             </div>
                              <table class="table footable">
                                <thead>
                                  <tr>
                                    <th data-hide="phone">ID</th>
                                    <th data-hide="expand">Nazwa radia</th>
                                    <th data-hide="phone">Gatunek radia</th>
                                    <th data-hide="phone">Edycja radia</th>
                                    <th data-hide="phone">Usuwanie radia</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($aList as $aOne) : ?>
                                    <tr>
                                        <td><?php echo $aOne['id'] ?></td>
                                        <td><?php echo $aOne[$sModuleName.'_name'] ?></td>
                                        <td>
                                            <?php foreach ($aOne['aGenre'] as $aOneGenre) : ?>
                                                <?php echo $aOneGenre['name_genre'] ?><br />
                                            <?php endforeach; ?>
                                        </td>
                                        <td><a class="btn btn-warning" href="<?php echo render_url('admin/'.$sModuleName.'_edit/'.$aOne['id'],''); ?>">Edytuj</a></td>
                                        <td>
                                            <form class="deleteRecord" action="<?php echo render_url('admin/'.$sModuleName.'_delete',''); ?>" method="post">
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
