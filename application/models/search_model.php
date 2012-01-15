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
 * name: search_model.php
 * @author Mouhyi
 */

class search_model extends CI_Model {

  /**
   * finds the rows in the 'events' table matching the search parameter
   * @author Mouhyi
   * @param string $search
   * @return $query
   */
  function find_match($search){

      $where = 'MATCH (description, title, location) AGAINST ("'. $search  .' " IN NATURAL LANGUAGE MODE )';
      $query = $this->db->where($where, NULL, FALSE);
      $query = $this->db->get('events');
      return $query;
  }

  /**
   * retrieves the childs list of $key_word from the 'key_words' table
   *@author Mouhyi
   * @param string $key_word
   * @return $query
   */

  function load_childs($key_word){
      $query = $this->db->where('key_word',$key_word);
      $query = $this->db->select('childs');
      $query = $this->db->get('key_words');
      return $query;;

  }
}
?>
