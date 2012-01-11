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
       // $check = imap_mailboxmsginfo($inbox);
       // echo "<br/>haha<br/>".$check->Nmsgs;
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

                        if($this->isValid(array('from'=>$overview[0]->from))==TRUE){
                            echo 'TRUE <br/>';
                        }else{
                            echo "FALSE <br/>";
                        }
                        $output.= '<span class="date">on '.$overview[0]->date.'</span>';
                        $output.= '</div>';

                        /* output the email body */
                        $output.= '<div class="body">'.$message.'</div>';
                        $output.='<br/>'; 

                }

                //echo $output;
        }

       // imap_mail_move($inbox,'1','ReadMessages');
         //imap_mail_move($data['inbox'], $data['id'], $data['mailbox']);
        //$this->moveEmailToReadMessages(array('inbox'=>$inbox, 'id'=>'1', 'mailbox'=>'readMessages'));
        //imap_expunge($inbox);
        /* close the connection */
        imap_close($inbox, CL_EXPUNGE);
        

    }
    
    /**
     * Verifies if the sender is valid
     * @param array sender
     * @return boolean
     */
    function isValid($data){
        $data['from']=str_replace(" ","",$data['from']);
        $data['from']=strip_tags($data['from']);
        $data['from']=mysql_escape_string($data['from']);
        print_r($data);
        echo "<br/><br/>";
        $this->load->model('user_model');
        return $this->user_model->validateEmail($data['from']);
    }

    /**
     * Verifies if the the message is well formed
     * @param string message
     * @return boolean
     */
    function isWellFormedMessage($message){
        return true;
    }

    /**
     * Adds an event to the db
     * @param array contains all the fields of the event
     * @return boolean
     */
    function addEvent($data){
        return true;
    }

    /*
     * Sends the error message to the sender when the email is not valid
     * @param string email address of the receiver
     * @return boolean
     */
    function emailInCaseOfError($email){
        return true;
    }

}
