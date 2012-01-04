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

		if( $this->is_key_valid( $this->input->post('key') )  ){
			$new_user = array(
			
			'email' => $this->input->post('email'),			
			'password' => md5($this->input->post('password'))		//md5	
				
			);
		
			$insert = $this->db->insert('users', $new_user);
			return $insert;
		
		}else{
			return false;		//
		}
		
	}

        /*
         * checks wether the key is valid
         * @return bool true on success, false on failure
         */
	function is_key_valid($key){
		/*$this->db->where('key', $key);
		$query = $this->db->get('keys');
		return ($query->num_rows > 0);*/
                return true;
	
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
