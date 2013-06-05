            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <p class="nagl">Lista ankiet</p>
                              <div class="buttonaddadmin">
                                 <a href="<?php echo base_url().'admin/survey_add'?>">
									<button class="btn btn-success" data-toggle="button" id="Button7">Dodaj ankietę</button>
								</a>
                             </div>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>L.p.</th>
                                    <th>Nazwa ankiety</th>
                                  </tr>
                                </thead>
                                <tbody>
	                                <?php foreach ($Surveys as $Key) : ?>	
										<tr>
											<td><?php echo $Key['id'] ?></td>
								            <td class="fullwidth"><?php echo $Key['survey_name'] ?></td>
										</tr>
										<tr>
											<td colspan="5"><p>Pytanie: </p><?php echo $Key['question'] ?></td>
										</tr>
										<tr>
											<td colspan="5" class="buttonsalign">
												<a href="<?php echo base_url().'admin/show_survey_options/'.$Key['id'] ?>">
													<button class="btn btn-info" data-toggle="button" id="Button4">Szczegóły</button>
												</a>
												<a href="<?php echo base_url().'admin/survey_edit/'.$Key['id'] ?>">
													<button class="btn btn-warning" data-toggle="button" id="Button1">Edytuj</button>
												</a>
												<a href="<?php echo base_url().'admin/survey_delete/'.$Key['id'] ?>">
													<button class="btn btn-danger" data-toggle="button" id="Button2">Usuń</button>
												</a>
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