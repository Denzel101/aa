<?php

@require_once('DBConn.class.php');

class Notificationizer extends DBConn {

    function notify($from, $to, $body, $url) {
        $notify = $this->lazyInsert("notificationizer", array("Nt_from", "Nt_to", "Nt_body", "Nt_url", "Nt_instime", "Nt_viewed"), array($from, $to, $body, $url, $this->DBdate, "0"), "");
        if ($notify) {
            return $notify;
        } else {
            return false;
        }
    }

    function setInternalNofitication($from, $to, $body, $url) {

        $from_details = $this->getEmailAddress($from);
        $to_details = $this->getEmailAddress($to);
        return $this->lazyInsert("auth_notifications", array("AN_FROM", "AN_TO", "AN_BODY", "AN_URL", "AN_INSTIME"), array($from, $to, $body, $url, $this->DBdate));
    }

    function setCustomerNotification() {
        
    }

    function getEmailAddress($uid) {
        $sql = $this->simpleLazySelect("users", "where USER_ID = $uid");
        return $sql[0];
    }

    function sendEmail($from, $to, $subject, $message) {
        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . PHP_EOL;
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . PHP_EOL;
        $headers .= 'From: brian@nearfieldltd.com' . PHP_EOL;
        $headers .= 'Cc: bktowett@gmail.com' . PHP_EOL;
        $headers.= "X-Priority: 1". PHP_EOL;;

// Mail it
        if (mail("jomboya@gmail.com", $subject, $message, $headers)) {
            return 'true';
        } else {
            return 'false';
        }
    }

    function setAsRead($id) {
        $setAsRead = $this->lazyUpdate("notificationizer", array("Nt_viewed"), array("1"), "Nt_id", $id);

        if ($setAsRead) {

            return $setAsRead;
        } else {
            return false;
        }
    }

    function fetchNotifications($userId) {
        return $this->simpleLazySelect("notificationizer", "WHERE Nt_to='$userId' AND Nt_viewed = 0");
    }

}
?>