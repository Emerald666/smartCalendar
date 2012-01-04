
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/

?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Register!</title>


</head>

<h1>Create an Account!</h1>


<body>

<?php //echo validation_errors(); ?>

<?php echo form_open('user_controller/add_user'); ?>

<h5>Email</h5>
<div style="color:red"> <?php echo form_error('email'); ?>  </div>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<h5>Password</h5>
<div style="color:red"> <?php echo form_error('password'); ?> </div>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<div style="color:red"> <?php echo form_error('passconf'); ?> </div>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Activation Key <a href="keyinfo.html"> Help </a> </h5>
<div style="color:red"> <?php echo form_error('key'); ?> </div>
<input type="text" name="key" value="<?php echo set_value('key'); ?>" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>




