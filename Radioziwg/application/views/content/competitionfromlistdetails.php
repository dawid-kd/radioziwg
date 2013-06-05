            <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <p class="nagl">Szczegóły konkursu</p>
                              <div class="buttonaddadmin">
                                 <a href="<?php echo base_url().'admin/show_all_compet'; ?>">
									<button class="btn btn-info" data-toggle="button" id="Button3">Pokaż wszystkie</button>
								</a>
                             </div>
                              <table class="table footable">
                                <thead>
                                  <tr>
                                    <th data-hide="phone">L.p.</th>
                                    <th data-hide="expand">Nazwa</th>
                                    <th data-hide="phone">Opis</th>
                                    <th data-hide="phone">Początek</th>
                                    <th data-hide="phone">Koniec</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?php echo $Competition['id'] ?></td>
                                    <td><?php echo $Competition['competition_name'] ?></td>
                                    <td><?php echo $Competition['description'] ?></td>
                                    <td><?php echo $Competition['start_date'] ?></td>
            						<td><?php echo $Competition['end_date'] ?></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                      <td class="fullwidth" colspan="5"><p>Pytanie: </p><?php echo $Competition['question'] ?></td>
                                  </tr>
                                  <tr>
                                    <td colspan="5" class="buttonsalign">
                                    <a href="<?php echo base_url().'admin/compet_edit/'.$Competition['id'] ?>">
										<button class="btn btn-warning" data-toggle="button" id="Button1">Edytuj</button>
									</a>
									<a href="<?php echo base_url().'admin/compet_delete/'.$Competition['id'] ?>">
										<button class="btn btn-danger" data-toggle="button" id="Button2">Usuń</button>
									</a>
                                  </tr>                                                                      
                                </tbody>
                              </table>
                             
                             <form action="<?php echo base_url().'admin/compet_answers/'.$Competition['id']; ?>" method="post">                     
                             <p class="nagl">Odpowiedzi</p>
                              <table class="table">

                                <thead>
                                  <tr>
                                    <th>Odpowiedzi użytkowników</th>
                                    <th>Przyznaj<br />nagrodę</th>
                                    <th>Usuwanie</th>                                    
                                  </tr>
                                </thead>
                               
                                <tbody>
                                	<?php foreach ($Answers as $Key) : ?>                                	
	                                  <tr>
	                                    <td><?php echo $Key['answer'] ?></td>
	                                    <td>
	                                    	<label class="checkbox">
		                                 		<input type="checkbox" name="user<?php echo $Key['user_id']; ?>" value="1" />
		                                	</label>
	                                    </td>
	                                    <td>
	                                    	<a href="<?php echo base_url().'admin/answer_delete/'.$Key['id'] ?>">
	                                    		<button class="btn btn-danger" data-toggle="button" id="Button5">Usuń</button>
	                                    	</a>
	                                    </td>	                                    
	                                  </tr>
                                	<?php endforeach; ?>
                                	<tr>
                                    	<td colspan="5" class="fullwidth" >		                                  
												<div>
			                                    	<input type="hidden" name="id" value="<?php echo $Competition['id'] ?>" />
			                                        <input type="hidden" name="bProceed" value="1" />
			                                        <input class="btn btn-warning" type="submit" value="Pokaż zwycięzców" />
			                                    </div>	
										</td>								
                                  </tr>                                  
                                </tbody>
                                </form>

                              </table>                               
                               
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>