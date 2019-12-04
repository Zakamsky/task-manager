<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01.12.2019
 * Time: 16:25
 */

class Login {
    function output() {
        global $db;

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // username and password sent from form

            $myusername = mysqli_real_escape_string($db,$_POST['username']);
            $mypassword = mysqli_real_escape_string($db,$_POST['password']);
            // получили из формы пароль и логин
            $sql = "SELECT * FROM t_users WHERE user_login = '$myusername'";
            $result = mysqli_query($db,$sql);
            $user = mysqli_fetch_array($result,MYSQLI_ASSOC);

//            $message = "1";
            if ($user['user_passhash'] === md5($mypassword.":::".$user['user_salt'])) {
                $message = '<div class="d-flex h100 p-5">
                                <div class="m-auto text-center">
                                    <h1 class="display-4">You are welcome</h1>
                                    <a href="/" class="h1">to home page</a>
                                </div>
                            </div>';
            } else {
                $message = '<div class="d-flex h100 p-5">
                                <div class="m-auto text-center">
                                    <h1 class="display-4">wrong password</h1>
                                    <a href="/?m=login" class="h1">try again</a>
                                </div>
                            </div>';
            };

            setcookie("user_login", "$myusername");
            setcookie("user_password", "$mypassword");
            return $message;

        };
        if (isset($_COOKIE['user_login'])){

            $login = $_COOKIE['user_login'];
            $sql = "SELECT * FROM t_users WHERE user_login = '$login'";
            $result = mysqli_query($db,$sql);
            $check_user = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $salt_pass=md5($_COOKIE['user_password'].":::".$check_user['user_salt']);

            if ($salt_pass == $check_user['user_passhash']){
                return $check_user;
            };
        };

        $login_form = '
            <form action="/?m=login&message=message" method="post" class="form-box">
                <div class="form-group">
                    <label for="InputTaskName">User name</label>
                    <input type="text" name="username" class="form-control" id="InputTaskName" required>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="InputPassword" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        ';

        return $login_form;
    }
}

?>
