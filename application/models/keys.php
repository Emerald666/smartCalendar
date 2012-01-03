<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/

class Keys extends CI_Model{

    /**
     * For testing purposes
     * @return
     */
    function getAll(){
        $query=$this->db->get('keys');
        return $query;
    }

    /**
     * Add key to the table
     * @param   name of the club/user
     * @return bool true on success, false on failure
     */
    function addKey($name){
        if($this->verifyName($name)==TRUE) return FALSE;
        do{
            $key = $this->generateKey();
        }while($this->verifyKey($name, $key)==TRUE);
        $data = array(
          'name'=>$name,
          'key'=>$key
        );
        $query=$this->db->insert('keys', $data);
        return $query;
    }

    /**
     * Generares the unique key
     * @return varchar
     */
    function generateKey(){
        return md5(uniqid(microtime()) . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
    }

    /**
     * Verify the existence of a key
     * @param name,key
     * @return bool true if it exists false otherwise
     */
    function verifyKey($name, $key){
        $data=array(
            'name'=>$name,
            'key'=>$key
        );
        $query=$this->db->get_where('keys', $data);
        if($query->num_rows()==1)   return TRUE;
        else return FALSE;
    }

    /**
     * Verify uniqueness of the name
     * @return bool true if it exists false otherwise
     */
    function verifyName($name){
        $data=array(
            'name'=>$name
        );
        $query=$this->db->get_where('keys', $data);
        if($query->num_rows()==1)   return TRUE;
        return FALSE;
    }

    /**
     * Delete a key
     * @param name,key
     * @return bool true if success and false otherwise
     */
    function deleteKey($name, $key){
        $data=array(
            'name'=>$name,
            'key'=>$key
        );
        $numRowsBefore=$this->db->count_all_results('keys');
        echo  $numRowsBefore."<br/>";
        $query=$this->db->delete('keys', $data);
        $numRowsAfter=$this->db->count_all_results('keys');
        echo  $numRowsAfter."<br/>";
        if(($numRowsBefore-$numRowsAfter)==1) return TRUE;
        return FALSE;
    }

    /**
     * Empty the table
     * @return bool true if success and false otherwise
     */
    function emptyTable(){
        $query=$this->db->empty_table('keys');
        $numRows=$this->db->count_all_results('keys');
        if($numRows==0) return TRUE;
        else return FALSE;
    }


}