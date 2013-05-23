<div class="span9">
<div id="content-center">
<?php echo form_open('users/changepassword'); ?>
    
        <fieldset>
          <legend>Zmiana hasła</legend>
          <div class="control-group">
            <label class="control-label" for="oldpassword">Stare hasło</label>
            <div class="controls">
               <?php echo form_error('oldpassword'); ?>
              <input type="password" class="input-xlarge" id="oldpassword" name="oldpassword">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="newpassword">Nowe hasło</label>
            <div class="controls">
                <?php echo form_error('newpassword'); ?>
              <input type="password" class="input-xlarge" id="newpassword" name="newpassword">
            </div>
          </div>
            <div class="control-group">
            <label class="control-label" for="newpassword2">Powtórz nowe hasło</label>
            <div class="controls">
                <?php echo form_error('newpassword2'); ?>
              <input type="password" class="input-xlarge" id="newpassword2" name="newpassword2">
            </div>
          </div>
            
          
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Zmień hasło</button>
          </div>
        </fieldset>

    <?php echo form_close(); ?>
</div>
</div>