<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.12.2019
 * Time: 16:12
 */
class Model_Edittask extends Model{

    public function get_task($task_id){
        $db = self::db();

        $sql = "SELECT * FROM t_tasks WHERE id = '$task_id'";
        $result = mysqli_query($db,$sql);
        $task = mysqli_fetch_array($result,MYSQLI_ASSOC);

        return $task;
    }

    public function edit_task($task){
        $db = self::db();
        // проверка зареган ли юзер
        $admin_login = mysqli_real_escape_string($db, $task['admin_login']);
        $admin_password = $task['admin_password'];
        $sql = "SELECT * FROM t_users WHERE user_login = '$admin_login'";
        $result = mysqli_query($db,$sql);
        $user = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if ($user['user_passhash'] === md5($admin_password.":::".$user['user_salt'])){

            $task_new_text = mysqli_real_escape_string($db,$task['tasktext']);
            if(isset($task['taskcomplite'])){$taskcomplite = mysqli_real_escape_string($db,$task['taskcomplite']);};

            $task_id = $task['task_id'];
            $sql = "SELECT task_text FROM t_tasks WHERE id = '$task_id'";
            $result = mysqli_query($db, $sql);
            $old_task = mysqli_fetch_array($result,MYSQLI_ASSOC);

            if($old_task['task_text'] != $task_new_text){ $task_text_edited = $task_new_text;};

            if(isset($task_text_edited) || isset($taskcomplite)){

                $sql_task = "UPDATE t_tasks SET ";

                if(isset($taskcomplite)){
                    $sql_task .= "task_status= '$taskcomplite' ";
                }
                if((isset($taskcomplite)) && (isset($task_text_edited))){
                    $sql_task .= ", ";
                }
                if(isset($task_text_edited)){
                    $sql_task .= "task_text = '$task_text_edited', task_edited = '1' ";
                }
                $sql_task .= "WHERE id = '$task_id'";

                $task_has_been_edited = mysqli_query($db, $sql_task) or die(mysqli_error($db));

            } else {
                $nothing_change = array(
                    'title' => 'Wrong!',
                    'text' => 'nothing has been changed',
                    'link' => '/edittask/index/?task_id='.$task_id,
                    'link-title' => 'try again',

                );

                return $nothing_change;
            }

            $data = array(
                'title' => 'Success!',
                'text' => 'the task has been edited',
            );

            if ($task_has_been_edited){
                return $data;
            }

        } else {
            $error = array(
                'title' => 'Error!',
                'text' => 'you are not an admin',
                'link' => '/login',
                'link-title' => 'login',
            );
            return $error;
        }
    }
}