<?php

class Calendar extends CI_Model{

    function getCalendarEvents(){
        if (!defined("PATH_SEPARATOR")) {
            if (strpos($_ENV["OS"], "Win") !== FALSE) {
                    define("PATH_SEPARATOR", ";");
            } else {
                    define("PATH_SEPARATOR", ":");
            }
        }
        ini_set('include_path',ini_get('include_path').PATH_SEPARATOR.BASEPATH.'../application/libraries/Zend_Gdata_library/');
        require_once 'Zend/Loader.php';
        Zend_Loader::loadClass('Zend_Gdata');
        Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
        Zend_Loader::loadClass('Zend_Gdata_Calendar');
        // User whose calendars you want to access
        $user = 'smartCalendar2012@gmail.com';
        $pass = 'codeIgniter';
        $service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME; // predefined service name for calendar
        $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
        $service = new Zend_Gdata_Calendar($client);

        /*
         *Lists the calendar title as well as its id
         */
        /*$listFeed=$service->getCalendarListFeed();
        echo "<h1>Calendar List</h1>";
        echo "<ul>";
        foreach ($listFeed as $calendar) {
             echo "<li>" . $calendar->title . " (" . $calendar->id . ")</li>";
        }
        echo "</ul>";*/

        /*
         * Lists the entries of the calendar
         */
        $query=$service->newEventQuery();
        $query->setUser('default');
        $query->setVisibility('private');
        $query->setProjection('full');
        $query->setOrderby('starttime');
        $query->setStartMin('2012-01-05');
        $query->setStartMax('2012-01-06');
        //$query->setMaxResults(1);
        try{
             $eventFeed = $service->getCalendarEventFeed($query);
        }catch(Zend_Gdata_App_Exception $e){
             echo "Error: " . $e->getMessage();
        }
        echo "<ul>";
        foreach ($eventFeed as $event) {
           // print_r($event);
            $title=$event->title;
            $location=$event->where[0]->valueString;
            $description=$event->content->text;
            $startTime=$event->when[0]->startTime;
            $endTime=$event->when[0]->endTime;
            echo "<li>".$title."<br/>".$location."<br/>".$startTime."\t".$endTime."<br/>".$description;
        }
        echo "</ul>";
    }
}
