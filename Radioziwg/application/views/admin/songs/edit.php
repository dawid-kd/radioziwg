<h3>Edycja</h3>

<?php if ($sMsg) : ?>
<h4 class="text-success"><?php echo $sMsg ?></h4>
<?php endif; ?>

<?php echo form_open(base_url().'admin/users_edit/'.$aUser['id']); ?>

<h5>First name</h5>
<?php echo form_error('user_name'); ?>
<input type="text" name="user_name" value="<?php echo set_value('user_name', $aUser['user_name']); ?>" size="50" />

<h5>Surname</h5>
<?php echo form_error('user_surname'); ?>
<input type="text" name="user_surname" value="<?php echo set_value('user_surname', $aUser['user_surname']); ?>" size="50" />

<h5>Login</h5>
<?php echo form_error('login'); ?>
<input type="text" name="login" value="<?php echo set_value('login', $aUser['login']); ?>" size="50" />

<h5>Password</h5>
<?php echo form_error('password'); ?>
<input type="text" name="password" value="<?php echo set_value('password', $aUser['password']); ?>" size="50" />

<h5>E-mail</h5>
<?php echo form_error('email1'); ?>
<input type="text" name="email1" value="<?php echo set_value('email1', $aUser['email1']); ?>" size="50" />

<h5>E-mail 2</h5>
<?php echo form_error('email2'); ?>
<input type="text" name="email2" value="<?php echo set_value('email2', $aUser['email2']); ?>" size="50" />

<h5>Street</h5>
<?php echo form_error('street'); ?>
<input type="text" name="street" value="<?php echo set_value('street', $aUser['street']); ?>" size="50"/> 

<h5>Postcode</h5>
<?php echo form_error('post_code'); ?>
<input type="text" name="post_code" value="<?php echo set_value('post_code', $aUser['post_code']); ?>" size="50"/> 

<h5>City</h5>
<?php echo form_error('city'); ?>
<input type="text" name="city" value="<?php echo set_value('city', $aUser['city']); ?>" size="50"/> 

<h5>Phone</h5>
<?php echo form_error('phone_number'); ?>
<input type="text" name="phone_number" value="<?php echo set_value('phone_number', $aUser['phone_number']); ?>" size="50"/> 

<h5>User type</h5>
<?php echo form_error('user_type'); ?>
<input type="text" name="user_type" value="<?php echo set_value('user_type', $aUser['user_type']); ?>" size="50"/> 

<div class='clearfix'></div>
<input type="hidden" name="id" value="<?php echo $aUser['id'] ?>" />
<input type="hidden" name="bProceed" value="1" />
<input class="btn" type="submit" value="Submit" />

<?php echo form_close() ?>