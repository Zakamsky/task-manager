<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 1:13
 */
class Controller_Login extends Controller{

    function __construct(){
        $this->model = new Model_Login();
        $this->view = new View();
    }


    function action_index(){
        $this->view->generate('login_view.php', 'template_view.php');
    }

    function action_message(){


        if($_SERVER["REQUEST_METHOD"] == "POST") {

            global $db; //todo: что то с этим надо сделать

            // username and password sent from form
            $myusername = mysqli_real_escape_string($db,$_POST['username']);
            $mypassword = mysqli_real_escape_string($db,$_POST['password']);
        }
        $user = $this->model->get_user($myusername);

        if ($user['user_passhash'] === md5($mypassword.":::".$user['user_salt'])){

            setcookie("user_login", "$myusername", 0, '/');
            setcookie("user_password", "$mypassword", 0, '/');

            $data['title'] = 'Welcome!';
            $data['text'] = 'hi '.$myusername.'! you are logged';

        } else {
            $data['title'] = 'Wrong way!';
            $data['text'] = 'login or password incorrect';
            $data['link-title'] = 'try again';
            $data['link'] = '/login';
        }

        $this->view->generate('message_view.php', 'template_view.php', $data);
    }
}