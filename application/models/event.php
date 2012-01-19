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

    /**
     * Adds the facebook to the events table
     * @author Leon
     * @param void
     * @return void
     */
    function addFacebook(){
       $this->load->model('facebook_model');
       $data=$this->facebook_model->getEvents();
       foreach($data as $entry){
           //Use this returned array to do stuff!
           $this->event->create($entry);
       }
    }
    /**
     * Adds the events received through email to the events tabls
     * @author Leon
     * @param void
     * @return void
     */
    function addEmails(){
        $this->load->model('gmail');
        $data=$this->gmail->getNewMail();
        foreach($data as $entry){
            $this->event->create($entry);
        }
    }
    /**
     * Goes through all the descriptions and makes sure that the new event
     * is not a duplicate of an already existing event
     * @author Leon
     * @todo make sure that the threshold of 40% is fair and realistic
     * @param array $data
     * @return boolean description is valid
     */
    function verifyDescription($data){
       $descriptions=$this->getDescriptions();
       for($i=0; $i<count($descriptions); $i++){
           similar_text($data, $descriptions[$i], $sim);
           if($sim>40) return FALSE;
       }
       return TRUE;
    }
    /**
     * Adds an event to the events table
     * @author Leon
     * @param array containing the events components
     * @return array contains information about the creation of the event
     */
    function create($data){
        if($this->verifyDescription($data['description'])==TRUE){
            $this->db->insert('events', $data);
            /*might be better to return the $query*/
            return array('created'=>'TRUE');
        }else{
            return array('created'=>'FALSE', 'title'=>$data['title'], 'userId'=>$data['userId']);
        }
    }
    /**
     * Deletes an event from the events table
     * @author Leon
     * @param array containing information about the event to remove
     * @return array contains information about the query processing
     */
    function delete($data){
        $query=$this->db->delete('events', $data);
        return $query;
    }
    /**
     * Updates an event based on the data passed to it
     * @param array $data to be changed
     * @param array $where the identification of the event
     * @return void
     */
    function update($data, $where){
        $query=$this->db->update('events', $data, $where);
        return $query;
    }
    /**
     * Returns all the description of the events
     * @author Leon
     * @param void
     * @return $query
     */
    function getAll(){
        $this->db->select('id, title , startTime');    /// changed on Jan 18, 10:29 pm EDT
        $query=$this->db->get('events');
        return $query;
    }
    /**
     *
     * @param <type> $data
     * @param <type> $limit
     * @param <type> $offset
     * @return <type>
     */
    function getAllBasicLimited($data, $limit, $offset){
       $query=$this->db->get_where('events', $data, $limit, $offset);
       return $query;
    }
    /**
     *
     * @param <type> $data
     */
    function getAllComplex($data){

    }
    /**
     *
     * @param <type> $data
     */
    function getBest($data){
        
    }
    /**
     *
     * @param <type> $data
     */
    function judge($data){

    }
    /**
     * Returns the descriptions
     * @author Leon
     * @param void
     * @return array of the descriptions
     */
    function getDescriptions(){
        $this->db->select('description');
        $query = $this->db->get('events');
        $data=array();
        foreach ($query->result() as $row){
            array_push($data, $row->description);
        }
        return $data;
    }

    /**
     *
     */
    public function addEvent(){
     $this->form_validation->set_rules('title', 'Title','trim|required|xss_clean');
          $this->form_validation->set_rules('location', 'Location','trim|required|xss_clean');
     $this->form_validation->set_rules('startTime', 'Start time','trim|required|xss_clean');
     $this->form_validation->set_rules('endTime', 'End time','trim|required|xss_clean');
     $this->form_validation->set_rules('description', 'Description','trim|required|xss_clean');
     if($this->form_validation->run() == FALSE){
        $this->load->view('errors');
     }else{
         $time=mktime()*1000;
        if(strcmp($this->input->get_post('startTime'),"NaN")==0 || strcmp($this->input->get_post('endTime'),"NaN")==0){
            $this->load->view('customErrors', array('errorNumber'=>1));
        }
        else if($time>$this->input->get_post('startTime') || $this->input->get_post('endTime')<$time){
            $this->load->view('customErrors', array('errorNumber'=>2));
        }
        else if($this->input->get_post('startTime') >= $this->input->get_post('endTime')){
            $this->load->view('customErrors', array('errorNumber'=>3));
        }else{
            $this->load->view('customErrors', array('errorNumber'=>-1));
        }
     }

    }




}


