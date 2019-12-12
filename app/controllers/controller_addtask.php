<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 1:12
 */
class Controller_Addtask extends Controller{

    function action_index(){
        $this->view->generate('addtask_view.php', 'template_view.php');
    }

    function action_message(){
        $this->view->generate('message_view.php', 'template_view.php');
    }
}