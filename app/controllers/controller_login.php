<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 1:13
 */
class Controller_Login extends Controller{

    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }


    function action_index(){
        $this->view->generate('login_view.php', 'template_view.php');
    }

    function action_message(){
        $this->view->generate('message_view.php', 'template_view.php');
    }
}