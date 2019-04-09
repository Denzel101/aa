<?php
/**
 * Created by PhpStorm.
 * User: ENVY
 * Date: 12/15/2018
 * Time: 7:49 PM
 */
include_once('DBConn.class.php');

class Mechanicsclass extends  DBConn{

    function newMechanics ($fname,$lname,$city,$mphone,$ophone,$email){

        $val =$this->lazyInsert("mechanic",

            array('M_FNAME','M_LNAME','M_CITY','M_MPHONE','M_OPHONE','M_EMAIL'),

            array($fname,$lname,$city,$mphone,$ophone,$email));

        return $val;
    }
}