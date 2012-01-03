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

class Userprofiles extends CI_Model{

    /**
     * For testing purposes
     * @return all the user profiles
     */
    function getAll(){
        $query=$this->db->get('userProfiles');
        return $query;
    }

    /**
     * creates a blank profile
     * @return true or false based on success of the operation
     */
    function createBlankProfile($data){
        $query=$this->db->insert('userProfiles', $data);
        return $query;
    }

    /**
     * Update a user profile
     * @param data array of elements to be updated
     */
    function updateProfile($data){

    }

    /**
     *
     * @param int $userId
     */
    function deleteProfile($userId){
        $data=array('userId'=>$userId);
        $numRowsBefore=$this->db->count_all_results('userProfiles');
        $query=$this->db->delete('userProfiles', $data);
        $numRowsAfter=$this->db->count_all_results('userProfiles');
        if(($numRowsBefore-$numRowsAfter)==1) return TRUE;
        return FALSE;
    }


}
