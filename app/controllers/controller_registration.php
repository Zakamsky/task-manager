<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 20:01
 */
class Controller_Registration extends Controller{

    function __construct(){
        $this->model = new Model_Registration();
        $this->view = new View();
    }

    function action_index(){
        $this->view->generate('registration_view.php', 'template_view.php');
    }

    function action_message(){
        $error = array(
            'title' => 'oops!',
            'text' => 'is there something wrong',
        );
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $user['myusername'] = $_POST['username'];
            $user['mypassword'] = $_POST['password'];
            $user['myemail'] = $_POST['email'];

            $result = $this->model->add_user($user);

            if($result){
                $data = array(
                    'title' => 'Succes!',
                    'text' => 'the user is registered',
                    'link-title' => 'login',
                    'link' => '/login',
                );
            } else {
                $data = $error;
            };

        } else {
            $data = $error;
        };
        $this->view->generate('message_view.php', 'template_view.php', $data);
    }
}