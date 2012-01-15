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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <title></title>
    </head>
    <body>

            <? echo form_open('search/do_search'); ?>

           
                <input type="text" name="q" />
                <input type="submit" name="Submit" value="Search" />
            
            <? echo form_close(); ?>

    </body>
</html>