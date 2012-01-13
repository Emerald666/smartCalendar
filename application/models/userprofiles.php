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

    function getProfile($userId){
        $query=$this->db->get_where('userProfiles', array('userId'=>$userId));
        $data=array();
        if($query->num_rows()==1){
            foreach ($query->result() as $row){
                 $data['name']=$row->name;
                 $data['description']=$row->description;
                 $data['emails']=$row->emails;
                 $data['webPages']=$row->webPages;
                 $data['phoneNumbers']=$row->phoneNumbers;
                 $data['hosts']=$row->hosts;
            }
        }
        return $data;
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
    function updateProfile(){
        $type=$this->input->get_post('type');
        $type=$this->input->_clean_input_data($type);
        $userId=$this->session->userdata('userId');
        $where=array('userId'=>$userId);
        switch ($type){
            case 1:
                $name=$this->input->get_post('name');
                $name=$this->input->_clean_input_data($name);
                $data=array('name'=>$name);
                $query=$this->db->update('userProfiles', $data, $where);
                if($query==TRUE){
                    echo "p";
                }else{
                    echo "f";
                }
                break;
            case 2:
                $description=$this->input->get_post('description');
                $description=$this->input->_clean_input_data($description);
                $data=array('description'=>$description);
                $query=$this->db->update('userProfiles', $data, $where);
                if($query==TRUE){
                    echo "p";
                }else{
                    echo "f";
                }
                break;
            case 3:
                $emails=$this->input->get_post('emails');
                $emails=$this->input->_clean_input_data($emails);
                $data=array('emails'=>$emails);
                $query=$this->db->update('userProfiles', $data, $where);
                if($query==TRUE){
                    echo "p";
                }else{
                    echo "f";
                }
                break;
            case 4:
                $webPages=$this->input->get_post('webPages');
                $webPages=$this->input->_clean_input_data($webPages);
                $data=array('webPages'=>$webPages);
                $query=$this->db->update('userProfiles', $data, $where);
                if($query==TRUE){
                    echo "p";
                }else{
                    echo "f";
                }
                break;
            case 5:
                $phoneNumbers=$this->input->get_post('phoneNumbers');
                $phoneNumbers=$this->input->_clean_input_data($phoneNumbers);
                $data=array('phoneNumbers'=>$phoneNumbers);
                $query=$this->db->update('userProfiles', $data, $where);
                if($query==TRUE){
                    echo "p";
                }else{
                    echo "f";
                }
                break;
           case 6:
                $hosts=$this->input->get_post('hosts');
                $phoneNumbers=$this->input->_clean_input_data($hosts);
                $data=array('hosts'=>$hosts);
                $query=$this->db->update('userProfiles', $data, $where);
                if($query==TRUE){
                    echo "p";
                }else{
                    echo "f";
                }
                break;
        }
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

    function getHosts(){
        $this->db->select('userId, hosts');
        $query = $this->db->get('userProfiles');
        $data=array();
        foreach ($query->result() as $row){
            $hosts = explode(",",$row->hosts);
            for($i=0; $i<count($hosts); $i++){
                $hosts[$i]=trim($hosts[$i]);
            }
        }
        array_push($data,array('userId'=>$row->userId,'hosts'=>$hosts));
        return $data;
    }


    function getEmails(){
        $this->db->select('userId,emails');
        $query=$this->db->get('userProfiles');
        $data=array();
        foreach ($query->result() as $row){
            $emails=explode(",",$row->emails);
            for($i=0; $i<count($emails); $i++){
                $emails[$i]=trim($emails[$i]);
            }
            array_push($data,array('userId'=>$row->userId,'emails'=>$emails));
        }

        return $data;
    }



}
