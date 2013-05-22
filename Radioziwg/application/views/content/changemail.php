<div class="span9">
<div id="content-center">
<?php echo form_open('users/changemail'); ?>
    
        <fieldset>
          <legend>Zmiana adresu email</legend>
          <div class="control-group">
            <label class="control-label" for="email">Nowy adres email</label>
            <div class="controls">
               <?php echo form_error('email'); ?>
              <input type="text" class="input-xlarge" id="email" name="email">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Hasło</label>
            <div class="controls">
                <?php echo form_error('password'); ?>
              <input type="password" class="input-xlarge" id="password" name="password">
            </div>
          </div>
            
            
          
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Zmień adres email</button>
          </div>
        </fieldset>

    <?php echo form_close(); ?>
</div>
</div>