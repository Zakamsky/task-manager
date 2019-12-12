<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 1:13
 */
class Controller_Logout extends Controller{


    function action_message(){
        $this->view->generate('message_view.php', 'template_view.php');
    }
}