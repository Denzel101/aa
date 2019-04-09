<?php

include_once('../classes/customers.php');

$customers = new Customersclass();

if (isset($_GET['tag'])) {
    $tag = $_GET['tag'];
} elseif (isset($_POST['tag'])) {
    $tag = $_POST['tag'];
}
$response = array();
switch ($tag) {


    case 'newcustomer':

        $fname=$_POST{'fname'};
        $lname=$_POST{'lname'};
        $email=$_POST{'email'};
        $password=$_POST{'password'};

        $newcustomers=$customers->newCustomers($fname,$lname,$email,$password);

        if ($newcustomers){
            $response['success']=1;
            $response['det']= $newcustomers;
            $response['msg']="successfully added customers";
        }else{
            $response['det']= null;
            $response['success']=0;
            $response['msg']="failed !!!";
        }

        break;

}
echo json_encode($response);
