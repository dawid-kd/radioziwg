<div class="span9">
<div id="content-center">
<?php echo form_open('users/forgotpassword'); ?>
    
        <fieldset>
          <legend>Przypomnienie hasła</legend>
          <div class="control-group">
            <label class="control-label" for="email">Stare hasło</label>
            <div class="controls">
               <?php echo form_error('email'); ?>
              <input type="text" class="input-xlarge" id="email" name="email">
            </div>
          </div>
         
          
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Wyślij hasło</button>
          </div>
        </fieldset>

    <?php echo form_close(); ?>
</div>
</div>