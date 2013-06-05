            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <p class="nagl">Szczegóły ankiety</p>
                              <div class="buttonaddadmin">
                                 <a href="<?php echo base_url().'admin/show_all_surveys'?>">
                                 	<button class="btn btn-info" data-toggle="button" id="Button3">Pokaż wszystkie</button></a>
                             </div>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>L.p.</th>
                                    <th>Nazwa</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?php echo $Survey['id'] ?></td>
                                    <td class="fullwidth"><?php echo $Survey['survey_name'] ?></td>
                                  </tr>
                                  <tr>
                                      <td colspan="5"><p>Pytanie: </p><?php echo $Survey['question'] ?></td>
                                  </tr>
                                  <tr>
                                    <td colspan="5" class="buttonsalign">
                                    	<a href="<?php echo base_url().'admin/survey_edit/'.$Survey['id'] ?>">
											<button class="btn btn-warning" data-toggle="button" id="Button1">Edytuj</button>
										</a>
										<a href="<?php echo base_url().'admin/survey_delete/'.$Survey['id'] ?>">
											<button class="btn btn-danger" data-toggle="button" id="Button2">Usuń</button>
										</a>
									</td>
                          		  </tr>                                                                  
                                </tbody>
                              </table> 
                              
                              <table class="table footable">
                                <thead>
                                  <tr>
                                    <th data-hide="phone">L.p.</th>
                                    <th data-hide="expand">Nazwa opcji</th>
                                    <th data-hide="phone">Liczba głosów</th>
                                    <th data-hide="phone">Edytowanie</th>
                                    <th data-hide="phone">Usuwanie</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($Options as $Option) : ?>
							        <tr>
							            <td><?php echo $Option['id'] ?></td>
							            <td><?php echo $Option['option_name'] ?></td>
										<td><?php echo $Option['option_count'] ?></td>
							            <td>
							            	<a href="<?php echo base_url().'admin/survey_option_edit/'.$Option['id'] ?>">
												<button class="btn btn-warning" data-toggle="button" id="Button1">Edytuj</button>
											</a>
							            </td>
							            <td>
							            	<a href="<?php echo base_url().'admin/survey_option_delete/'.$Option['id'] ?>">
												<button class="btn btn-danger" data-toggle="button" id="Button2">Usuń</button>
											</a>
							            </td>
							        </tr>
							       <?php endforeach; ?>                                                                                 
                                </tbody>
                              </table>
                               
                              <div class ="surveysPadding">
                          			<form action="<?php echo base_url().'admin/show_survey_options/'.$Survey['id']?>" method="post">
		                               <p>Nazwa nowej opcji</p>
		                                <input type="text" name="option_name" maxlength="255" placeholder="Nazwa" style="width:250px" />
		                              </div>
		                               
		                              <div class="form-actions">
		                              	<input type="hidden" name="bProceed" value="1" />
		                                <button type="submit" class="btn btn-primary">Dodaj opcję</button>
		                              </div>
		                            </form>
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
            </div>
       </div>