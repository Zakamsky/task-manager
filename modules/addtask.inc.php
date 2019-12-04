<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02.12.2019
 * Time: 18:30
 */
class Addtask{
    function output(){


        $add_task_form = '
            <form method = "post" class="form-box">
                <div class="form-group">
                    <label for="InputTaskName">User name</label>
                    <input type="text" name="taskname" class="form-control" id="InputTaskName" required>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email address</label>
                    <input type="email" name="taskemail" class="form-control" id="InputEmail" required>
                </div>
                <div class="form-group">
                    <label for="FormControlTextarea">Example textarea</label>
                    <textarea name="tasktext" class="form-control" id="FormControlTextarea" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        ';

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // username and password sent from form
            global $db;
            $taskname = mysqli_real_escape_string($db, $_POST['taskname']);
            $taskemail = mysqli_real_escape_string($db, $_POST['taskemail']);
            $tasktext = mysqli_real_escape_string($db,$_POST['tasktext']);
            $regdate = time();

            if ($_COOKIE['user_login'] != ""){
                $user_login = $_COOKIE['user_login'];
                $sql_id = "SELECT id FROM t_users WHERE user_login = '$user_login'";
                $result = mysqli_query($db,$sql_id);
                $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $user_id = $user['id'];
            } else {
                $user_id = 0;
            };

            $sql = "INSERT INTO t_tasks SET user_id = '$user_id', user_name = '$taskname', task_email = '$taskemail', task_text = '$tasktext', task_date = '$regdate'";
            $result = mysqli_query($db, $sql) or die(mysqli_error($db));

            if($result){
                $out = '
                                <div class="d-flex h100 p-5">
                                    <div class="m-auto text-center">
                                        <h1 class="display-4">the task was created successfully</h1>
                                        <a href="/" class="h2 d-block">to home page</a>
                                    </div>
                                </div>
                            ';
                return $out;
            }
        }
        return $add_task_form;
    }
}
