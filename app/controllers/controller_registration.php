<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 20:01
 */
class Controller_Registration extends Controller{

    function action_index(){
        $this->view->generate('registration_form_view.php', 'template_view.php');
    }

    function action_message(){
        $this->view->generate('message_view.php', 'template_view.php');
    }
}