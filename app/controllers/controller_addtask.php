<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 1:12
 */
class Controller_Addtask extends Controller{

    function __construct(){
        $this->model = new Model_Addtask();
        $this->view = new View();
    }

    function action_index(){
        $this->view->generate('addtask_view.php', 'template_view.php');
    }

    function action_message(){

        $error = array(
            'title' => 'oops!',
            'text' => 'is there something wrong',

        );

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $task = array(
              'taskname' => $_POST['taskname'],
              'taskemail' => $_POST['taskemail'],
              'tasktext' => $_POST['tasktext'],
              'regdate' => time()
            );

            if ($_COOKIE['user_login'] != ""){
                $task['user_login'] = $_COOKIE['user_login'];
            };

            $result = $this->model->add_task($task);

            if($result){
                $data = array(
                        'title' => 'Success!',
                        'text' => 'new task was added',
                        'link' => '/addtask',
                        'link-title' => 'add another',
                    );
            } else {
                $data = $error;
            }
        } else {
            $data = $error;
        }
        $this->view->generate('message_view.php', 'template_view.php', $data);
    }
}