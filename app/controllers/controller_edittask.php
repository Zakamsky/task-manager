<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 1:12
 */
class Controller_Edittask extends Controller{

    function __construct(){
        $this->model = new Model_Edittask();
        $this->view = new View();
    }

    function action_index(){
        if(isset($_GET['task_id']) && isset($_COOKIE['user_login'])){
            $task_id = $_GET['task_id'];
            $data = $this->model->get_task($task_id);
            $this->view->generate('edittask_view.php', 'template_view.php', $data);
        } else {
            $this->view->generate('404_view.php', 'template_view.php');
        }

    }

    function action_message(){
        $error = array(
            'title' => 'oops!',
            'text' => 'is there something wrong',

        );
        if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_COOKIE['user_login'])) {

            $task = array(
                'admin_login' => $_COOKIE['user_login'],
                'admin_password' => $_COOKIE['user_password'],
                'task_id' => $_POST['task_id'],
                'taskname' => $_POST['taskname'],
                'taskemail' => $_POST['taskemail'],
                'tasktext' => $_POST['tasktext'],
            );
            if(isset($_POST['taskcomplite'])){
                $task['taskcomplite'] = $_POST['taskcomplite'];
            }

            $data = $this->model->edit_task($task);

        } else {
            $data = $error;
        }
        $this->view->generate('message_view.php', 'template_view.php', $data);
    }
}