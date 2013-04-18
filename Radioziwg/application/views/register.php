<html>
<head>
<title>My Form</title>
</head>
<body>


<?php echo form_open('users/register'); ?>

<h5>Username</h5>
<?php echo form_error('login'); ?>
<input type="text" name="login" value="" size="50" />

<h5>email</h5>
<?php echo form_error('email1'); ?>
<input type="text" name="email1" value="" size="50" />

<h5>Password</h5>
<?php echo form_error('password'); ?>
<input type="text" name="password" value="" size="50" />

<h5>Password1</h5>
<?php echo form_error('password1'); ?>
<input type="text" name="password1" value="" size="50" />

<h5>nam</h5>
<?php echo form_error('user_name'); ?>
<input type="text" name="user_name" value="" size="50" />

<h5>sur</h5>
<?php echo form_error('user_surname'); ?>
<input type="text" name="user_surname" value="" size="50" />

<h5>regulamin</h5>
<?php echo form_error('rulesConfirm'); ?>
<input type="checkbox" name="rulesConfirm" value="zgoda"/> 

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>
