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
class Message extends CI_Model {
    
    /**
     * Every event must adhere to the following standards
     *
     * Title: xxxx\n ==> should it span more than one line ==> in which case we can
     *  split depending on our words==> must occur once in the event
     * Location: xxxx\n
     * Start time: xxxx\n
     * End time: xxxx\n
     * Description: xxxx\n ==> this is good because we allow the description to span
     *  as much space as it needs (we will need to set a limit !)
     *
     */

    function Validate($message){
        //$message="Title: is amine\nLocation: hello\nStart time: 2012-12-31 21:51:39\nEnd time: 2012-12-31 21:51:37\nDescription: Nothing special\n hello\nrkfro ";
        if(isContentInOrder($message)==FALSE){
            return NULL;
        }
        if(isDuplicateFree($message)==FALSE){
            return NULL;
        }
        $pieces=getPieces($message);
        if(count($pieces)!=5){
            return NULL;
        }
        $count=0;
        $times=array();
        $data=array();
        foreach($pieces as $piece){
            $usefulBit=splitPiece($piece);
            if($count==2 || $count==3){
                if($count==2) $times['start']=$usefulBit;
                else $times['end']=$usefulBit;
            }
            echo $usefulBit;
            echo "<br/>";
            $count++;
        }
        echo "Time<br/>";
        foreach($times as $time){
            if(validateTime($time)==FALSE){
                return NULL;
            }
        }

        if(strtotime($times['start'])>=strtotime($times['end'])){
            return NULL;
        }

        $data['title']=$pieces[0];
        $data['location']=$pieces[1];
        $data['startTime']=$pieces[2];
        $data['endTime']=$pieces[3];
        $data['description']=$pieces[4];
        echo "<br/>";
        print_r($data);
        echo "valid ".strtotime($time)."<br/>";
    }

    /**
     * Ensure that the different pieces of the message are in order
     * @param string message
     * @return boolean
     */
    function isContentInOrder($message){
        $needles=array('title:', 'Title:', 'location', 'Location', 'start time:', 'Start time:', 'end time:', 'End time:', 'description', 'Description');
        $positions=array();

        for($i=0, $j=0; $i<count($needles); $i+=2){
            $pos1=strpos($message, $needles[$i]);
            if($pos1===FALSE){
                $pos2=strpos($message, $needles[$i+1]);
                if($pos2===FALSE){
                    return FALSE;
                }else{
                    array_push($positions, $pos2);
                }
            }else{
                array_push($positions, $pos1);
            }
        }
        for($i=0; $i<count($positions)-1; $i++){
            if($positions[$i]>$positions[$i+1]) {
                return FALSE;
            }
        }
        return TRUE;
    }



    /**
     * Ensure that there are no duplicates of the keywords
     * @param string message
     * @return bool
     */
    function isDuplicateFree($message){
        $countTitle=preg_match_all("/(title:|Title:)/", $message, $out,PREG_PATTERN_ORDER);
        if($countTitle!=1) return FALSE;
        $countLocation=preg_match_all("/(Location:|location:)/", $message, $out,PREG_PATTERN_ORDER);
        if($countLocation!=1) return FALSE;
        $countStartTime=preg_match_all("/(start time:|Start time:)/", $message, $out,PREG_PATTERN_ORDER);
        if($countStartTime!=1) return FALSE;
        $countEndTime=preg_match_all("/(End time:|end time:)/", $message, $out,PREG_PATTERN_ORDER);
        if($countEndTime!=1) return FALSE;
        $countDescription=preg_match_all("/(Description:|description:)/", $message, $out,PREG_PATTERN_ORDER);
        if($countDescription!=1) return FALSE;
        return TRUE;
    }

    /**
     * Gets the pieces of an event
     * @param string the whole message
     * @return array the different pieces of the message
     */
    function getPieces($message){
        $contents= explode("\n", $message, 5);
        return $contents;
    }

    /**
     * Explodes each piece of the event into an array keeping flexibility in mind
     * @param string piece of the message
     * @return array with the useful content of the piece
     */
     function splitPiece($message){
         $contents = preg_split("/(^title:|^Title:|^Location:|^location:|^start time:|^Start time:|^End time:|^end time:|^Description:|^description:)/", $message);//,-1,PREG_SPLIT_OFFSET_CAPTURE);
         return strip_tags(trim($contents[1]));
     }


    /**
     *
     * Dates must also have a valid format in order to be processed
     * This Regular Expression will verify if a date is a valid YYYY-MM-DD with an optional HH:MM:SS
     *
     */
    function validateTime($date){
        if (preg_match('/\\A(?:^((\\d{2}(([02468][048])|([13579][26]))[\\-\\/\\s]?((((0?[13578])|(1[02]))[\\-\\/\\s]?((0?[1-9])|([1-2][0-9])|(3[01])))|(((0?[469])|(11))[\\-\\/\\s]?((0?[1-9])|([1-2][0-9])|(30)))|(0?2[\\-\\/\\s]?((0?[1-9])|([1-2][0-9])))))|(\\d{2}(([02468][1235679])|([13579][01345789]))[\\-\\/\\s]?((((0?[13578])|(1[02]))[\\-\\/\\s]?((0?[1-9])|([1-2][0-9])|(3[01])))|(((0?[469])|(11))[\\-\\/\\s]?((0?[1-9])|([1-2][0-9])|(30)))|(0?2[\\-\\/\\s]?((0?[1-9])|(1[0-9])|(2[0-8]))))))(\\s(((0?[0-9])|(1[0-9])|(2[0-3]))\\:([0-5][0-9])((\\s)|(\\:([0-5][0-9])))?))?$)\\z/', $date)) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}

