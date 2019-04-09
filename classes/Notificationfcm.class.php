<?php
/**
* 
*/
include_once('../classes/DBConn.class.php');

class fcm extends DBConn{
	
	function sendto($registrationIds, $body)
	{
		 //define( 'API_ACCESS_KEY', 'AAAAevwrO1I:APA91bFIsp7WGADs9Uag_1M9t6YBo537T-rag_P9jVy9RPM4zvDbNquG9noTJxiTEAQvT0S1Lkb2XGeAfVxm4IurouxYJI6QkHX1E0GZJv4y7qWk-3w0K_nzI8Ens205c_WKH_FWFk2_' );
    //$registrationIds = $_GET['id'];
      $setregistrationIds = 'dnKFyep7Gs0:APA91bHdTb-VPsoqJ7FYtRFmCLpdz2ffhHwnPW4j3ZieJ-x1pUHiBDwZTuqckQvmeuNVkFICX66n69DbQ0iOROnVcT7Q4jMfS4NtQhrTu0arTLmnOFVECZypSM6mkkT4T55VlbC6eiC7';
      $msgsample = "Easter Deals!! Don't miss out"; 
#prep the bundle
     $msg = array
          (
		'body' 	=> $body,
		'title'	=> 'Autocare',
             	'icon'	=> 'myicon',/*Default Icon*/
              	'sound' => 'mySound'/*Default sound*/
          );
	$fields = array
			(
				'to'		=> $registrationIds,
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=AAAAevwrO1I:APA91bFIsp7WGADs9Uag_1M9t6YBo537T-rag_P9jVy9RPM4zvDbNquG9noTJxiTEAQvT0S1Lkb2XGeAfVxm4IurouxYJI6QkHX1E0GZJv4y7qWk-3w0K_nzI8Ens205c_WKH_FWFk2_',
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );

		$endresult = json_decode($result,true);
		$success = $endresult['success'];
#Echo Result Of FireBase Server
   
//echo $result;
			if($success){
				return "worry not ! Message was sent ";
				echo $result;
				}
				else{
					return 0;
					echo $result;
				}
        return $endresult;
			}
                        
    // sending push message to single user by firebase reg id
    public function send($to, $message) {
        $fields = array(
            'to' => $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // Sending message to a topic by topic name
    public function sendToTopic($to, $message) {
        $fields = array(
            'to' => '/topics/' . $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

     // sending push message to multiple users by firebase registration ids
    public function sendMultiple($registration_ids, $message) {
        $fields = array(
            'to' => $registration_ids,
            'data' => $message,
        );
 
        return $this->sendPushNotification($fields);
    }

	 // function makes curl request to firebase servers
    private function sendPushNotification($fields) {
         
//        require_once __DIR__ . '/config.php';
 
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';
 
        $headers = array(
            'Authorization: key=' . FIREBASE_API_KEY,
            'Content-Type: application/json'
        );
    }

}
#API access key from Google API's Console
   
?>