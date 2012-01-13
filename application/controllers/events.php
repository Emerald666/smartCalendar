<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_Session $session

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/
class Events extends CI_Controller{

    function getFacebook(){
        //add the facebookEvents
        $this->load->model('event');
        $this->event->addFacebook();
   }

   function getEmails(){
       $this->load->model('event');
       $this->event->addEmails();
   }

   function getAll(){
       $this->load->model('event');
       $query=$this->event->getAll();
       foreach($query->result() as $row){
           echo "<p>";
           echo nl2br($row->description);
           echo "</p><br/>";
       }
   }




}
