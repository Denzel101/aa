<?php
/**
 * Created by PhpStorm.
 * User: ENVY
 * Date: 12/15/2018
 * Time: 7:49 PM
 */
include_once('DBConn.class.php');

class Customersclass extends  DBConn{

    function newCustomers ($fname,$lname,$email,$password){

        $val =$this->lazyInsert("customer",

            array('C_FNAME','C_LNAME','C_EMAIL','C_PASSWORD'),

            array($fname,$lname,$email,$password));

        return $val;
    }
}