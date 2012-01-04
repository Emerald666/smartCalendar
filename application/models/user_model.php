<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/

class User_model extends CI_Model {


        /*
         * add the user to the 'users' table
         * @return bool true on success, false on failure
         */
        function create_user()
	{
                $emailVar=$this->input->post('email');
                $passwordVar= md5($this->input->post('password'));


                $this->load->model('keys');
                $query = $this->keys->verifyKey($emailVar, $this->input->post('key'));
		if( $query  ){
			$new_user = array(
			
			'email' => $emailVar,
			'password' => $passwordVar		//md5
				
			);
		
			$insert = $this->db->insert('users', $new_user);
			return $insert;
		
		}else{
			return false;		//
		}
		
	}

       function get_id($email){
                $this->db->where('email', $email);
                $this->db->select('id');
                $query = $this->db->get('users');
                if ($query->num_rows() == 1){
                          $row = $query->row();
                          return $row->id;

                }else
                    return null;
       }

        /*
         * checks that the email and password submitted by the user
         * exist in the 'users' table
         * @return bool true on success, false on failure
         */
	function validate()
	{
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));  //md5
		$query = $this->db->get('users');
		
		return ($query->num_rows == 1);
	}

}
?>
