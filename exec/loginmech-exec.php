<?php

include_once('../classes/loginmech.php');

$loginmech = new Loginmechclass();

if (isset($_GET['tag'])) {
    $tag = $_GET['tag'];
} elseif (isset($_POST['tag'])) {
    $tag = $_POST['tag'];
}
$response = array();
switch ($tag) {


    case 'newloginmech':

        $email=$_POST{'email'};
        $password=$_POST{'password'};

        $newloginmech=$loginmech->newLoginmech($email,$password);

        if ($newloginmech){
            $response['success']=1;
            $response['det']= $newloginmech;
            $response['msg']="successfully logged in mechanics";
        }else{
            $response['det']= null;
            $response['success']=0;
            $response['msg']="failed !!!";
        }

        break;

}
echo json_encode($response);
