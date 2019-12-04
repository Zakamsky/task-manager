<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04.12.2019
 * Time: 0:05
 */
class edittask{
    function output(){
        global $db;

        $task_id = mysqli_real_escape_string($db,$_GET['id']);
        $sql = "SELECT * FROM t_tasks WHERE id = '$task_id'";
        $result = mysqli_query($db,$sql);
        $task = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $add_task_form = '
            <form method = "post" class="form-box">
                <div class="form-group">
                    <label for="InputTaskName">User name</label>
                    <input value="'.$task['user_name'].'" readonly type="text" name="taskname" class="form-control" id="InputTaskName" >
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email address</label>
                    <input value="'.$task['task_email'].'" readonly type="email" name="taskemail" class="form-control" id="InputEmail">
                </div>
                <div class="form-group">
                    <label for="FormControlTextarea">Example textarea</label>
                    <textarea name="tasktext" class="form-control" id="FormControlTextarea" rows="3">'.$task['task_text'].'</textarea>
                </div>
                <div class="custom-control custom-checkbox pb-3">
                    <input value="1" type="checkbox" name="taskcomplite" class="custom-control-input" id="taskchek">
                    <label class="custom-control-label" for="taskchek">Task complited</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/" class="btn btn-secondary">close without change</a>
            </form>
        ';

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            global $db;
            $task_new_text = mysqli_real_escape_string($db,$_POST['tasktext']);
            if(isset($_POST['taskcomplite'])){$taskcomplite = mysqli_real_escape_string($db,$_POST['taskcomplite']);};
            if($task['task_text'] != $task_new_text){ $task_text_edited = $task_new_text;};

            $not_admin = '
                        <div class="d-flex h100 p-5">
                            <div class="m-auto text-center">
                                <h1 class="display-4 text-warning">¡You are not an Admin!</h1>
                                <a href="/" class="h2 d-block">to home page</a>
                                <a href="/?m=login" class="h2">to login</a>
                            </div>
                        </div>
                        ';
            if(isset($task_text_edited) || isset($taskcomplite)){
                if (isset($_COOKIE['user_login']) && isset($_COOKIE['user_password'])){

                    $myusername = $_COOKIE['user_login'];
                    $mypassword = $_COOKIE['user_password'];
                    $sql = "SELECT * FROM t_users WHERE user_login = '$myusername'";
                    $result = mysqli_query($db,$sql);
                    $user = mysqli_fetch_array($result,MYSQLI_ASSOC);

                    if ($user['user_passhash'] === md5($mypassword.":::".$user['user_salt'])) {
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

//                        echo $sql_task.'<br>';

                        $result_task = mysqli_query($db, $sql_task) or die(mysqli_error($db));

                        if($result_task){
                            $out = '
                                <div class="d-flex h100 p-5">
                                    <div class="m-auto text-center">
                                        <h1 class="display-4">the task was changed successfully</h1>
                                        <a href="/" class="h2 d-block">to home page</a>
                                    </div>
                                </div>
                            ';
                            return $out;
                        }else{
                            $out = '
                                <div class="d-flex h100 p-5">
                                    <div class="m-auto text-center">
                                        <h1 class="display-4">uuups! something wrong</h1>
                                        <a href="/" class="h2 d-block">to home page</a>
                                    </div>
                                </div>
                            ';
                            return $out;
                        }

                    } else{
                        return $not_admin;
                    };
                } else {
                    return $not_admin;
                };

            } else {
                $out = '
                        <div class="d-flex h100 p-5">
                            <div class="m-auto text-center">
                                <h1 class="display-4">nothing has been changed</h1>
                                <a href="/" class="h2 d-block">to home page</a>
                                <a href="/?m=edittask&id='.$task_id.'" class="h2">try again</a>
                            </div>
                        </div>
                        ';
                return $out;
            }

        }
        return $add_task_form;
    }
}

