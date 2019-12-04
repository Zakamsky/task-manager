<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01.12.2019
 * Time: 19:07
 */

class Registration {
    function output() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // username and password sent from form
            global $db;

            $myusername = mysqli_real_escape_string($db, $_POST['username']);
            $mypassword = mysqli_real_escape_string($db, $_POST['password']);
            $myemail = mysqli_real_escape_string($db,$_POST['email']);


            //==== код для регистрации пользователя ====//
            //заводим сальт и хеш для пароля:
            $user_salt = substr(md5(md5(time())), 0, 8);
            $salt_pass = md5($mypassword . ":::" . $user_salt);
            $regtime = time();

            //сохраняем в бд
            $sql = "INSERT INTO t_users SET user_login = '$myusername', user_passhash = '$salt_pass', user_salt = '$user_salt', user_email = '$myemail', user_regdate = $regtime";
            $result = mysqli_query($db, $sql) or die(mysqli_error($db));
            if($result){
                $out = '
                                <div class="d-flex h100 p-5">
                                    <div class="m-auto text-center">
                                        <h1 class="display-4">Thank you for registration</h1>
                                        <a href="/?m=login" class="h2 d-block">login</a>
                                        <a href="/" class="h2 d-block">to home page</a>
                                    </div>
                                </div>
                            ';
                return $out;
            }
        };

        $reg_form = '
            <form method = "post" class="form-box">
                <div class="form-group">
                    <label for="InputTaskName">User name</label>
                    <input type="text" name="username" class="form-control" id="InputTaskName" required>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="InputPassword" required>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email address</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        ';
        return $reg_form;
    }
}


?>

            <!--<form action = "" method = "post">
                <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                <label>e-mail  :</label><input type = "email" name = "email" class = "box" /><br/><br />
                <input type = "submit" value = " Submit "/><br />
            </form>-->

