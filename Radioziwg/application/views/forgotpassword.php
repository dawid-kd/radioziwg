<html>
<head>
<title>My Form</title>
</head>
<body>


<?php echo form_open('users/forgotpassword'); ?>

<h5>mail</h5>
<?php echo form_error('email'); ?>
<input type="text" name="email" value="" size="50" />




<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>