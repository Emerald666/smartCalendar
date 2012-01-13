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

class Event extends CI_Model{

    function addFacebook(){
       $this->load->model('facebook_model');
       $data=$this->facebook_model->getEvents();
       foreach($data as $entry){
           //Use this returned array to do stuff!
           $this->event->create($entry);
       }
    }

    function addEmails(){
        $this->load->model('gmail');
        $data=$this->gmail->getNewMail();
        foreach($data as $entry){
            $this->event->create($entry);
        }
    }

    function verifyDescription($data){
       $descriptions=$this->getDescriptions();
       for($i=0; $i<count($descriptions); $i++){
           similar_text($data, $descriptions[$i], $sim);
           if($sim>40) return FALSE;
       }
       return TRUE;
    }

    function create($data){
        if($this->verifyDescription($data['description'])==TRUE){
            $this->db->insert('events', $data);
            return array('created'=>'TRUE');
        }else{
            return array('created'=>'FALSE', 'title'=>$data['title'], 'userId'=>$data['userId']);
        }
    }

    function delete($data){
        $query=$this->db->delete('events', $data);
        return $query;
    }

    function update($data, $where){
        $query=$this->db->update('events', $data, $where);
        return $query;
    }

    function getAll(){
        $this->db->select('description');
        $query=$this->db->get('events');
        return $query;
    }

    function getAllBasicLimited($data, $limit, $offset){
       $query=$this->db->get_where('events', $data, $limit, $offset);
       return $query;
    }

    function getAllComplex($data){

    }

    function getBest($data){
        
    }

    function judge($data){

    }

    function getDescriptions(){
        $this->db->select('description');
        $query = $this->db->get('events');
        $data=array();
        foreach ($query->result() as $row){
            array_push($data, $row->description);
        }
        return $data;
    }



}


