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

/**
 * @name events.php
 * @author Mouhyi & Leon
 * Description: manages events
 */

class Events extends CI_Controller{
    /**
     * Populates the events table with Facebook events
     * @author Leon
     * @param void
     * @return void
     */
    function getFacebook(){
        $this->load->model('event');
        $this->event->addFacebook();
   }

    /**
     * Populates the events table with events received through emails
     * @author Leon
     * @param void
     * @return void
     */
   function getEmails(){
       $this->load->model('event');
       $this->event->addEmails();
   }

   /**
    * Simple method used for testing that returns the events description
    * @author Leon
    * @param void
    * @return void
    */
   function getAll(){
       $this->load->model('event');
       $query=$this->event->getAll();
       foreach($query->result() as $row){
           echo "<p>";
           echo nl2br($row->description);
           echo "</p><br/>";
       }
   }

   function addNewEvent(){
       $this->load->model('event');
       return $this->event->addEvent();
   }



   /**
    * For testing the sort() function
    * @author Mouhyi
    * @param array $sorted_events
    */
   function test(){
       $this->load->model('event');
       $query=$this->event->getAll();
       $events = $query->result_array();
       $tmp = $this->event->sort($events);
       $data =array('daily_events' => ($tmp)  );
       $this->load->view('view_events_test',$data);
   }

}
