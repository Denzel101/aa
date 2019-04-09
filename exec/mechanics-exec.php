<?php

include_once('../classes/mechanics.php');

$mechanics = new Mechanicsclass();

if (isset($_GET['tag'])) {
    $tag = $_GET['tag'];
} elseif (isset($_POST['tag'])) {
    $tag = $_POST['tag'];
}
$response = array();
switch ($tag) {


    case 'newmechanics':

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $city=$_POST{'city'};
        $mphone=$_POST{'mphone'};
        $ophone=$_POST{'ophone'};
        $email=$_POST{'email'};

        $newmechanics=$mechanics->newMechanics($fname,$lname,$city,$mphone,$ophone,$email);

        if ($newmechanics){
            $response['success']=1;
            $response['det']= $newmechanics;
            $response['msg']="successfully added mechanics";
        }else{
            $response['det']= null;
            $response['success']=0;
            $response['msg']="failed !!!";
        }

        break;

}
echo json_encode($response);
