<?php
/**
 * Created by PhpStorm.
 * User: ENVY
 * Date: 12/15/2018
 * Time: 7:49 PM
 */
include_once('DBConn.class.php');

class Loginmechclass extends  DBConn{

    function newLoginmech ($email,$password){

        $val =$this->lazyInsert("loginmech",

            array('LM_EMAIL','LM_PASSWORD'),

            array($email,$password));

        return $val;
    }
}