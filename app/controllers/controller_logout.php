<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 1:13
 */
class Controller_Logout extends Controller{


    function action_index(){
        setcookie("user_login", "", -3600, '/');
        setcookie("user_password", "", -3600, '/');
        header('Location:/logout/message');

//        $this->view->generate('logout_view.php', 'template_view.php');
    }

    function action_message(){

        $data['title'] = 'oops!';
        $data['text'] = 'you are log out';
        $data['link-title'] = 'login';
        $data['link'] = '/login';
        $this->view->generate('message_view.php', 'template_view.php', $data);
    }
}