<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/

class Gmail extends CI_Model{

    function getNewMail(){
        /* connect to gmail */
        $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'smartCalendar2012@gmail.com';
        $password = 'codeIgniter';

        /* try to connect */
        $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

        /* grab emails that are unanswered */
        $emails = imap_search($inbox,'UNANSWERED');

        /* if emails are returned, cycle through each... */
        if($emails) {

                /* begin output var */
                $output = '';

                /* put the newest emails on top */
                rsort($emails);

                /* for every email... */
                foreach($emails as $email_number) {

                        /* get information specific to this email */
                        $overview = imap_fetch_overview($inbox,$email_number,0);
                        /*if we want images set it 1 to a 2*/
                        $message = imap_fetchbody($inbox,$email_number,1);


                        /* output the email header information */
                        $output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
                        $output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
                        $output.= '<span class="from">'.$overview[0]->from.'</span>';
                        $output.= '<span class="date">on '.$overview[0]->date.'</span>';
                        $output.= '</div>';

                        /* output the email body */
                        $output.= '<div class="body">'.$message.'</div>';
                        $output.='<br/>';
                }

                echo $output;
        }

        /* close the connection */
        imap_close($inbox);

    }
}
