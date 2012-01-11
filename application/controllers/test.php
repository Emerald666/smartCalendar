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

	public function index()
	{
           $this->load->model('userprofiles');
           $data=$this->userprofiles->getProfile(2);
           $this->load->view("modifyProfile_view", $data);
	}
        public function updateUserProfile(){
            $this->load->model('userprofiles');
            $this->userprofiles->updateProfile();

        }
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
       public function getEmails(){
           $this->load->model('gmail');
           $this->gmail->getNewMail();//isValid(array('bla'=>'bla'));//
       }
       public function getEvents(){
           $this->load->model('calendar');
           $this->calendar->getCalendarEvents();
       }

      public function facebookLogin(){
          $this->load->model('facebook_model');
          $this->facebook_model->getEvents();
      }

}
