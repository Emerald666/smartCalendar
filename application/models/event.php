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


    function create($data){

    }

    function deleteEvent($data){
        $query=$this->db->delete('events', $data);
        return $query;
    }

    function updateEvent($data, $where){
        $query=$this->db->update('events', $data, $where);
        return $query;
    }

    function getEventsBasic($data, $limit, $offset){
       $query=$this->db->get_where('events', $data, $limit, $offset);
       return $query;
    }

    function getEventsComplex($data){

    }

    function getBestEvents($data){
        
    }

    function judgeEvent($data){

    }

}


