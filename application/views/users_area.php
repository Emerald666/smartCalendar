<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>untitled</title>
</head>
<body>
	<h2>Welcome Back, <?php echo $this->session->userdata('email'); ?>!</h2>
     <p>This section represents the area that only logged in members can access.</p>
	<h4><?php echo anchor('user_controller/logout', 'Logout'); ?></h4>
</body>
</html>