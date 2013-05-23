<div class="span9">
<div id="content-center">
<?php echo form_open('users/register'); ?>
    
        <fieldset>
          <legend>Rejestracja nowego użytkownika</legend>
          <div class="control-group">
            <label class="control-label" for="login">Login</label>
            <div class="controls">
                <?php echo form_error('login'); ?>
              <input type="text" class="input-xlarge" id="login" name="login">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email1">Adres email</label>
            <div class="controls">
                <?php echo form_error('email1'); ?>
              <input type="text" class="input-xlarge" id="email1" name="email1">
            </div>
          </div>
            <div class="control-group">
            <label class="control-label" for="password">Hasło</label>
            <div class="controls">
                <?php echo form_error('password'); ?>
              <input type="password" class="input-xlarge" id="password" name="password">
            </div>
          </div>
            <div class="control-group">
            <label class="control-label" for="password1">Powtórz hasło</label>
            <div class="controls">
                <?php echo form_error('password1'); ?>
              <input type="password" class="input-xlarge" id="password1" name="password1">
            </div>
          </div>
            <div class="control-group">
            <label class="control-label" for="user_name">Imię</label>
            <div class="controls">
                <?php echo form_error('user_name'); ?>
              <input type="text" class="input-xlarge" id="user_name" name="user_name">
            </div>
            </div>
          <div class="control-group">
            <label class="control-label" for="user_surname">Nazwisko</label>
            <div class="controls">
                <?php echo form_error('user_surname'); ?>
              <input type="text" class="input-xlarge" id="user_surname" name="user_surname">
            </div>
          </div>
          <div>
            <label class="checkbox">
                <?php echo form_error('rulesConfirm'); ?>
             <input type="checkbox" name="rulesConfirm"> Zaakceptuj regulamin, aby zakończyć rejestrację
            </label>
          </div>
          <div class="form-actions">
              
            <button type="submit" class="btn btn-primary">Rejestracja</button>
          </div>
        </fieldset>

    <?php //echo form_close(); ?>
</div>
</div>