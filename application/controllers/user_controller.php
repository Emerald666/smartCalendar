<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/



class User_controller extends CI_Controller {

        //$this->load->library('session');

	function index()
	{
		
		$this->load->view('login_form');
                
	}

        /*
         * open the signup view
         */
        function signup(){
            $this->load->view('signup_form');
        }

        /**
         * add_user: add NEW user to the database
         * reloads signup_form in case of input errors or Invalid key
         * redirect to signup success on success
         *
         * TEST: Jan 03 2011, 11:31 pm    OK
         */
	function add_user(){

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('key', 'Key', 'trim|required');


            if($this->form_validation->run() == FALSE)
            {
                    $this->load->view('signup_form');
            }

            else
            {

                    $this->load->model('user_model');
                    $query = $this->user_model->create_user();
                    if($query){
                            $this->load->view('signup_success');    //
                    }else
                            echo 'INVALID KEY';
                            $this->load->view('signup_form');

            }
         }
	
	/*
         * checks that the user is valid
         * open users_area view on success login
         * reloads the login_form with error essage on failure
         */
	function validate_credentials()
	{		
		$this->load->model('user_model');
		$query = $this->user_model->validate();
		
		if($query) // if the user's credentials validated...
		{
			$data = array(
				'email' => $this->input->post('email'),
				'logged_in' => true
			);
			$this->session->set_userdata($data);
                        
                        $this->load->view('users_area');
			//redirect('siteprofile page');
		}
		else // incorrect username or password
		{
                        echo "Invalid Account, try again";
                        $this->index();
		}
	}	
	
        /*
         * log out : destroys dession and redirect to index
         */
	function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

}
?>
