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
 * @name: search.php
 * @author mouhyi
 * Description: implements the search by keyword feature of the website
 */

class Search extends CI_Controller {

/**
 * temp funct: loads search form view
 *
 */
function index(){
    $this->load->view('search_form');
}

/**
 * reads user's input from search form and  call search function on it
 * @todo  security improvements
 * @author Mouhyi
 * @param
 * @return
 */
function read_search(){
    
        /** Read search Keywords **/
        // Get the search variable from URL
       $var=$this->input->post('q');
       $trimmed = trim($var);   
       $search=mysql_real_escape_string($trimmed);
       $this->find($search);
       
}

      /**   END Read search Keywords **/

       
       
/**
 * call search_model->find_match on the variable $search and then loads search_view_test
 * @todo change the view loaded
 * @author Mouhyi
 * @param
 * @return
 */
function find($search){

    /** MySQL FULL TEXT SEARCH
    * !!!! 50% threshold
    *  **/
  $this->load->model('search_model');
  $query = $this->search_model->find_match($search);

   /** END MySQL FULL TEXT SEARCH **/

   $data = array('events'=>$query->result_array() );

   $this->load->view('search_view_test',$data);

  }



/**
 * call search_model->loads_childs on $key_word and then loads search_view_test
 * then call $this->find on the key_words childs list retieved from db
 * @author Mouhyi
 * @param
 * @return
 */
 function find_key($key_word){
     $this->load->model('search_model');
     $query = $this->search_model->load_childs($key_word);
     $row = $query->row_array();
     //$search =  $result['childs'];
     $search = $row['childs'];
     $this->find($search);

 }

}

?>
