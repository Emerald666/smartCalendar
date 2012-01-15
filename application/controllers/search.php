<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/


class Search extends CI_Controller {


function index(){
    $this->load->view('search_form');
}

function do_search(){
    
        /** Read search Keywords **/
        // Get the search variable from URL
       $var=$this->input->post('q');
       $trimmed = trim($var);
         // check for an empty string and display a message.
       if ($trimmed == "" || !isset($var))
       {
          echo "<p>Please enter a search...</p>";
          exit;
       }
       $search=mysql_real_escape_string($trimmed);
       

       // Needs major security improvements

      /**   END Read search Keywords **/

       //$where = 'MATCH (title, description) AGAINST ("MySQL"   WITH QUERY EXPANSION )';

       /** MySQL FULL TEXT SEARCH
        * !!!! 50% threshold
        *  **/
      
      $this->load->model('search_model');
      $query = $this->search_model->find_match($search);

       /** END MySQL FULL TEXT SEARCH **/

       $data = array('events'=>$query->result_array() );

       //var_dump($query->result_array());

       $this->load->view('search_view_test',$data);

        }

}

?>
