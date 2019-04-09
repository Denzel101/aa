<?php
/**
 * Created by PhpStorm.
 * User: ENVY
 * Date: 12/15/2018
 * Time: 7:49 PM
 */
include_once('DBConn.class.php');

class Contactsclass extends  DBConn{

    function newContacts ($fname,$lname,$email,$pnumber,$comment){

        $val =$this->lazyInsert("contactus",

            array('CU_FNAME','CU_LNAME','CU_EMAIL','CU_PNUMBER','CU_COMMENT'),

            array($fname,$lname,$email,$pnumber,$comment));

        return $val;
    }
}