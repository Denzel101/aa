<?php

include_once('../classes/contactus.php');

$contacts = new Contactsclass();

if (isset($_GET['tag'])) {
    $tag = $_GET['tag'];
} elseif (isset($_POST['tag'])) {
    $tag = $_POST['tag'];
}
$response = array();
switch ($tag) {


    case 'newcontacts':

        $fname=$_POST{'fname'};
        $lname=$_POST{'lname'};
        $email=$_POST{'email'};
        $pnumber=$_POST{'pnumber'};
        $comment=$_POST{'comment'};

        $newcontacts=$contacts->newContacts($fname,$lname,$email,$pnumber,$comment);

        if ($newcontacts){
            $response['success']=1;
            $response['det']= $newcontacts;
            $response['msg']="successfully added contacts";
        }else{
            $response['det']= null;
            $response['success']=0;
            $response['msg']="failed !!!";
        }

        break;

}
echo json_encode($response);
