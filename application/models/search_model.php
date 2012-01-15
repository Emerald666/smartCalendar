<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search
 *
 * @author mouhyi
 */
class search_model extends CI_Model {


  function find_match($search){

      $where = 'MATCH (description, title, location) AGAINST ("'. $search  .' " IN NATURAL LANGUAGE MODE )';
      $query = $this->db->where($where, NULL, FALSE);
      $query = $this->db->get('events');
      return $query;
  }

  function load_childs($key_word){
      $query = $this->db->where('key_word',$key_word);
      $query = $this->db->select('childs');
      $query = $this->db->get('key_words');
      return $query;;

  }
}
?>
