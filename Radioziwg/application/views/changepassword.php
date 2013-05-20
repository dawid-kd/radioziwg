<html>
<head>
<title>My Form</title>
</head>
<body>


<?php echo form_open('users/changepassword'); ?>

<h5>oldpassword</h5>
<?php echo form_error('oldpassword'); ?>
<input type="text" name="oldpassword" value="" size="50" />

<h5>newpassword</h5>
<?php echo form_error('newpassword'); ?>
<input type="text" name="newpassword" value="" size="50" />

<h5>newpassword2</h5>
<?php echo form_error('newpassword2'); ?>
<input type="text" name="newpassword2" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>