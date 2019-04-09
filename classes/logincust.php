<?php
/**
 * Created by PhpStorm.
 * User: ENVY
 * Date: 12/15/2018
 * Time: 7:49 PM
 */
include_once('DBConn.class.php');

class Logincustclass extends  DBConn{

    function newLogincust ($email,$password){

        $val =$this->lazyInsert("logincust",

            array('LC_EMAIL','LC_PASSWORD'),

            array($email,$password));

        return $val;
    }
}