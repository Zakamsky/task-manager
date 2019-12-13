<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.12.2019
 * Time: 2:08
 */
class Model_Addtask extends Model{

    public function add_task($task){
        global $db; //todo: что то с этим надо сделать



        if(isset($task['user_login'])){
            $user_login = $task['user_login'];
            $sql_id = "SELECT id FROM t_users WHERE user_login = '$user_login'";
            $result = mysqli_query($db,$sql_id);
            $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $user_id = $user['id'];
        } else {
            $user_id = 0;
        }

        $taskname = $task['taskname'];
        $taskemail = $task['taskemail'];
        $tasktext = $task['tasktext'];
        $regdate = $task['regdate'];

        $sql = "INSERT INTO t_tasks SET user_id = '$user_id', user_name = '$taskname', task_email = '$taskemail', task_text = '$tasktext', task_date = '$regdate'";
        $result = mysqli_query($db, $sql);


        return $result;
    }
}