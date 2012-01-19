<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/

/**
 * implements the sifnup and login functionalities of the website
 * @name: user.php
 * @author Mouhyi
 */

class User extends CI_Controller {

        
        /**
         * redirects the user to the login form
         * @author Mouhyi
         * @param
         * @return
         */
	function index(){
            $this->load->view('login_form');
            //echo base_url();
        }


        /**
         * open the signup view
         * @author Mouhyi
         * @param
         * @return
         */
        function signup(){
            $this->load->view('signup_form');
        }

       
         /**
         * add NEW user to the database
         * reload signup_form in case of input errors or Invalid key
         * redirect to signup success on success
         * @author Mouhyi
         * @param
         * @return
         * TEST: Jan 03 2011, 11:31 pm    OK
         */
	function add_user(){
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('key', 'Key', 'trim|required');
            if($this->form_validation->run() == FALSE){
                    $this->load->view('errors');
            }else{
                $this->load->model('user_model');
                $query = $this->user_model->create_user();
                if($query){
                    $this->load->model('userprofiles');
                    $id = $this->getID();
                    $this->userprofiles->createBlankProfile(array('userId'=>$id));
                    $data=$this->userprofiles->getProfile($id);
                    $this->session->set_userdata('userId', $id);//****
                    //Not sure how to tackle this one
                    $this->load->view("modifyProfile_view", $data);
                    //$this->load->view('signup_success');
                 }else{
                    $this->load->view('customErrors', array('errorNumber'=>4));
                 }

            }
         }

         /**
         * retrieves user's id from database
         * @author Mouhyi
         * @param
         * @return int user ID
         */
         function getID($email){
            $this->load->model('user_model');
            return $this->user_model->get_id($email);
            //return $this->user_model->get_id('demo@demo.ca');
         }



         /**
         * check that the user is valid
         * open users_area view on success login
         * reload the login_form with error essage on failure
         * @author Mouhyi
         * @param
         * @return
         */
	function validate_credentials(){
            $this->form_validation->set_rules('email', 'Email','trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password','trim|required|xss_clean');
            if($this->form_validation->run() == FALSE){
                $this->load->view("errors");
            }else{
                $this->load->model('user_model');
                $query = $this->user_model->validate();
                if($query) // if the user's credentials validated...
                {
                    $data = array(
                            'email' => $this->input->post('email'),
                            'logged_in' => true
                    );
                    // create session and insert user's email
                    $this->session->set_userdata($data);
                    $userId = $this->getID($this->input->post('email'));
                    $this->session->set_userdata('userId', $userId);
                    //redirect to use_area
                    echo 'p';
                    //$this->load->view("users_area", $data);
                }else{ // incorrect username or password
                    $this->load->view("invalidAccount");
                }
            }
	}

        /**
         * redirects to users area
         * @todo get events
         * @author Mouhyi
         * @return
         * @param
         */
	function gotoProfile(){
            if($this->isLogged())
                $this->load->view('users_area');
            else
                $this->index();
        }

        function updateProfile(){
            if($this->isLogged()){
                $userId = $this->session->userdata('userId');
                $this->load->model('userprofiles');
                $data=$this->userprofiles->getProfile($userId);
                $this->load->view("modifyProfile_view", $data);

            }else
                $this->index();
        }

        /**
         * checks if user is logged in
         * @author Mouhyi
         * @param
         * @return
         */
        function isLogged(){
            return !($this->session->userdata('logged_in') === FALSE);
        }
       
         /**
         * destroys session and redirect to index
         * @author Mouhyi
         * @param
         * @return
         */
        function logout(){
            $this->session->sess_destroy();
            $this->load->view('welcome');
	}

}
?>
