            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <p class="nagl">Lista użytkowników</p>
                              <div class="buttonaddadmin">
                                 <a href="<?php echo render_url('admin/users_add',''); ?>"><button class="btn btn-success" data-toggle="button" id="Button7">Dodaj nowego użytkownika</button></a>
                             </div>
                              <table class="table footable">
                                <thead>
                                  <tr>
                                    <th data-hide="phone">ID</th>
                                    <th data-hide="phone">Imię</th>
                                    <th class="fullwidth" data-hide="expand">Nazwisko</th>
                                    <th data-hide="phone">Email</th>
                                    <th data-hide="phone">Edytowanie</th>
                                    <th data-hide="phone">Usuwanie</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($aUsers as $aOneUser) : ?>
                                    <tr>
                                        <td><?php echo $aOneUser['id'] ?></td>
                                        <td><?php echo $aOneUser['user_name'] ?></td>
                                        <td class="fullwidth"> <?php echo $aOneUser['user_surname'] ?></td>
                                        <td><?php echo $aOneUser['email1'] ?></td>
                                        <td><a class="btn btn-warning" href="<?php echo render_url('admin/users_edit/'.$aOneUser['id'],''); ?>">Edytuj</a></td>
                                        <td>
                                            <form class="deleteRecord" action="<?php echo render_url('admin/users_delete',''); ?>" method="post">
                                                <input type="hidden" name="id" value="<?php echo $aOneUser['id'] ?>" />
                                                <input class="btn btn-danger" type="submit" name="delete" value="Delete" />
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
<!--                                  <tr>
                                    <td>1</td>
                                    <td>Dawid</td>
                                    <td class="fullwidth">Dawidowski</td>
                                    <td>sadasdasd@wp.pl</td>
                                    <td><a href="edituser.html"><button class="btn btn-warning" data-toggle="button" id="Button1">Edytuj</button></a></td>
                                    <td><button class="btn btn-danger" data-toggle="button" id="Button2">Usuń</button></td>
                                  </tr>
                                  <tr>
                                    <td>1</td>
                                    <td>Dawid</td>
                                    <td>Dawidowski</td>
                                    <td>sadasdasd@wp.pl</td>
                                    <td><a href="edituser.html"><button class="btn btn-warning" data-toggle="button" id="Button3">Edytuj</button></a></td>
                                    <td><button class="btn btn-danger" data-toggle="button" id="Button4">Usuń</button></td>
                                  </tr>
                                  <tr>
                                    <td>1</td>
                                    <td>Dawid</td>
                                    <td>Dawidowski</td>
                                    <td>sadasdasd@wp.pl</td>
                                    <td><a href="edituser.html"><button class="btn btn-warning" data-toggle="button" id="Button5">Edytuj</button></a></td>
                                    <td><button class="btn btn-danger" data-toggle="button" id="Button6">Usuń</button></td>
                                  </tr>-->
                                </tbody>
                              </table> 
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
            </div>
       </div>