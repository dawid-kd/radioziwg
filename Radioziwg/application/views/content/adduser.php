           <div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                    <div class="span8 span8-ext bgblue2">
                      <div class="surveysPadding">
                          <article>                             
                             <?php echo form_open(render_url('admin/users_add','')); ?>
                                    <p class="nagl">Dodawanie użytkownika</p>
                                    <?php if ($sMsg) : ?>
                                    <h4 class="text-success"><?php echo $sMsg ?></h4>
                                    <?php endif; ?>
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Imię</label>
                                      <?php echo form_error('user_name'); ?>
                                      <div class="controls">
                                        <input type="text" name="user_name" value="<?php echo set_value('user_name'); ?>" size="50" />
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Nazwisko</label>
                                      <?php echo form_error('user_surname'); ?>
                                      <div class="controls">
                                        <input type="text" name="user_surname" value="<?php echo set_value('user_surname'); ?>" size="50" />
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Login</label>
                                      <?php echo form_error('login'); ?>
                                      <div class="controls">
                                        <input type="text" name="login" value="<?php echo set_value('login'); ?>" size="50" />
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Hasło</label>
                                      <?php echo form_error('password'); ?>
                                      <div class="controls">
                                        <input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />
                                        <p class="help-block">Hasło musi zawierać co najmniej 6 znaków</p>
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Adres Email</label>
                                      <?php echo form_error('email1'); ?>
                                      <div class="controls">
                                        <input type="text" name="email1" value="<?php echo set_value('email1'); ?>" size="50" />
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Dodatkowy adres email</label>
                                      <?php echo form_error('email2'); ?>
                                      <div class="controls">
                                        <input type="text" name="email2" value="<?php echo set_value('email2'); ?>" size="50" />
                                        <p class="help-block">Dodatkowy adres email pozwoli w razie problemów zidentyfikować użytkownika</p>
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Adres</label>
                                      <?php echo form_error('street'); ?>
                                      <div class="controls">
                                        <input type="text" name="street" value="<?php echo set_value('street'); ?>" size="50"/> 
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Kod pocztowy</label>
                                      <?php echo form_error('post_code'); ?>
                                      <div class="controls">
                                        <input type="text" name="post_code" value="<?php echo set_value('post_code'); ?>" size="50"/> 
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Miasto</label>
                                      <?php echo form_error('city'); ?>
                                      <div class="controls">
                                        <input type="text" name="city" value="<?php echo set_value('city'); ?>" size="50"/> 
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Numer telefonu</label>
                                      <?php echo form_error('phone_number'); ?>
                                      <div class="controls">
                                        <input type="text" name="phone_number" value="<?php echo set_value('phone_number'); ?>" size="50"/> 
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="input01">Typ użytkownika</label>
                                      <?php echo form_error('user_type'); ?>
                                      <div class="controls">
                                          <select name="user_type">
                                              <option value="A">Admin</option>
                                              <option value="U">Użytkownik</option>
                                          </select>
                                      </div>
                                    </div>
                                    
                                    <input type="hidden" name="bProceed" value="1" />
                                    
                                    <div class="form-actions">
                                      <button type="submit" class="btn btn-primary">Dodaj użytkownika</button>
                                    </div>
                                </form>
                          </article>                     
                      </div>
                      </div> 
                </div>                
            </div>
            </div>
       </div>