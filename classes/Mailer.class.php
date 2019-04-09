<?php
/**
 * Created by PhpStorm.
 * User: ELITEBOOK 840
 * Date: 9/6/2018
 * Time: 11:20 PM
 */

class Mailer extends DBConn{

    function getEmail(){
        $val = $this->simpleLazySelect("users","WHERE USER_EMAIL ");
    }
}