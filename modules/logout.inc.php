<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02.12.2019
 * Time: 14:31
 */
class Logout{
    function output(){

        setcookie("user_login", "", -3600);
        setcookie("user_password", "", -3600);
        $out = '
        <div class="d-flex h100 p-5">
            <div class="m-auto text-center">
                <h1 class="display-4">you are log out</h1>
                <a href="/" class="h1">to home page</a>
            </div>
        </div>
        ';

        return $out;
    }
}
?>


