<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/
class Test extends CI_Controller {
    /**
     * Tests the display of the modify user profile
     * @author Leon
     * @param void
     * @return void
     */
    public function index()
    {
       $this->load->model('userprofiles');
       $data=$this->userprofiles->getProfile(2);
       $this->load->view("modifyProfile_view", $data);
    }
    /**
     * Test the update profile by calling the appropriate method
     * @author Leon
     * @param void
     * @return void
     */
    public function updateUserProfile(){
        $this->load->model('userprofiles');
        $this->userprofiles->updateProfile();
    }
    /**
     * Tests the key generation
     * @author Leon
     * @param void
     * @return void
     */
    public function testKeys(){
        $this->load->model('keys');
        $query=$this->keys->addKey('test2');
        if($query==TRUE){
            echo "success<br/>";
        }else{
            echo "failure<br/>";
        }

        echo "hello world";
    }
    /**
     * Test the gmail model by retrieving the emails
     * @author Leon
     * @param void
     * @return void
     */
    public function getEmails(){
       $this->load->model('gmail');
       $this->gmail->getNewMail();//isValid(array('bla'=>'bla'));//
    }
    /**
     * Test the calendar model by retrieving the events
     * @author Leon
     * @param void
     * @return void
     */
    public function getEvents(){
       $this->load->model('calendar');
       $this->calendar->getCalendarEvents();
    }
    /**
     * Tests the facebook model by retrieving the events
     * @author Leon
     * @param void
     * @return void
     */
    public function getFacebook(){
      $this->load->model('facebook_model');
      print_r($this->facebook_model->getEvents());
    }

    /**
     * Test the date picker plugin through view display
     * @author Leon
     * @param void
     * @return void
     */
    public function testDatePicker(){
      $this->load->view('event_form');
    }
    /**
     * Gets Called when an event is created, will be copy pasted to the event model
     * @author Leon
     * @param void
     * @return void
     */
    public function addEvent(){
     $this->form_validation->set_rules('title', 'Title','trim|required|xss_clean');
     $this->form_validation->set_rules('startTime', 'Start time','trim|required|xss_clean');
     $this->form_validation->set_rules('endTime', 'End time','trim|required|xss_clean');
     $this->form_validation->set_rules('description', 'Description','trim|required|xss_clean');
     if($this->form_validation->run() == FALSE){
        $this->testDatePicker();
     }else{
        echo "hello";
     }

    }
    /**
     * Get all the hosts that can invite us on facebook to their events
     * @author Leon
     * @param void
     * @return void
     */
    public function getHosts(){
      $this->load->model('userprofiles');
      $this->userprofiles->getHosts();
    }
    /**
     * Loads the welcome view
     * @author Leon
     * @param void
     * @return void
     */
    public function getWelcome(){
    $this->load->view('welcome');
    }
    /**
     * Loads the user page view
     * @author Leon
     * @param void
     * @return void
     */
    public function getUserPage(){
      $this->load->view('users_area');
    }
    /**
     * Loads the modify event view
     * @author Leon
     * @param void
     * @return void
     */
    public function modifyEvent(){
      $eventId = $this->uri->segment(3, 2);
      $this->db->select('title, startTime, endTime, description, location');
      $query=$this->db->get_where('events', array('id'=>$eventId));
      $data=array();
      foreach($query->result() as $row){
          $data['title']=$row->title;
          $data['location']=$row->location;
          $data['startTime']=$row->startTime;
          $data['endTime']=$row->endTime;
          $data['description']=$row->description;
      }
      $this->load->view('modifyEvent', $data);
    }

}
