<?php

include_once('../classes/logincust.php');

$logincust = new Logincustclass();

if (isset($_GET['tag'])) {
    $tag = $_GET['tag'];
} elseif (isset($_POST['tag'])) {
    $tag = $_POST['tag'];
}
$response = array();
switch ($tag) {


    case 'newlogincust':

        $email=$_POST{'email'};
        $password=$_POST{'password'};

        $newlogincust=$logincust->newLogincust($email,$password);

        if ($newlogincust){
            $response['success']=1;
            $response['det']= $newlogincust;
            $response['msg']="successfully logged in customera";
        }else{
            $response['det']= null;
            $response['success']=0;
            $response['msg']="failed !!!";
        }

        break;

}
echo json_encode($response);
