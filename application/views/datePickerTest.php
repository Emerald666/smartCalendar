<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>jQuery UI Tabs with Next/Previous</title>
        <link rel="stylesheet" href="<?php echo base_url("/application/libraries/css/jquery-ui-timepicker-addon.css");?>" type="text/css" media="screen, projection"/>
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url("/application/libraries/css/jquery-ui-1.8.16.custom.css");?>" />
	<script type="text/javascript" src="<?php echo base_url("/application/libraries/js/jquery-1.3.2.min.js");?>"></script>
	<script type="text/javascript" src="<?php echo base_url("/application/libraries/js/jquery-ui-1.8.16.custom.min.js");?>"></script>
	<script type="text/javascript" src="<?php echo base_url("/application/libraries/js/jquery-ui-timepicker-addon.js");?>"</script>
	<script type="text/javascript" src="<?php echo base_url("/application/libraries/js/jquery-ui-sliderAccess.js");?>"</script>
    <script type="text/javascript">
		$(function() {
			$('#example1').datetimepicker();
		});
    </script>

</head>

<body>

	<div class="example-container">
		<p>Add a simple timepicker to jQuery UI's datepicker</p>
		<div>
	 		<input type="text" name="example1" id="example1" value="" />
		</div>
	</div>
</body>

</html>
