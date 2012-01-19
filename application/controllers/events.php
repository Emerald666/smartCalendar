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
    * groups events into an associative arary : day=>array(corresponding events)
    * @author Mouhyi
    * @param array $events
    * @return $sorted_events
    */
   function sort($events){
       foreach ($events as $event){
          $day = get_day($event) ;
          if ($day!= NULL){
              $sorted_events[$day][]= $event;
          }
       }
       return $sorted_events;
   }


   /**
    * return the event start date in the format:  Day_of_the_week   Month   Day_of_he_month
    * @param array $event
    * @return string date
    */
   function get_day($event){
       if(array_key_exists('startTime', $event) )
           return  date ("l F j, Y",$event['startTime']);
       else
           return NULL;
   }

   /**
    * For testing the sort() function
    * @author Mouhyi
    * @param arry $sorted_events
    */
   function test(){
       $this->load->model('event');
       $query=$this->event->getAll();
       $events = $query->result_array();
       $tmp = sort('events');
       $data =array('daily_events' => ($tmp)  );
       $this->load->view('view_events_test',$data);
   }

}
