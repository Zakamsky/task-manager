<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 13.12.2019
 * Time: 2:52
 */
class Model_Registration extends Model{

    public function add_user($user){
        $db = self::db();

        $myusername = mysqli_real_escape_string($db, $user['myusername']);
        $mypassword = mysqli_real_escape_string($db, $user['mypassword']);
        $myemail = mysqli_real_escape_string($db, $user['myemail']);


        //==== код для регистрации пользователя ====//
        //заводим сальт и хеш для пароля:
        $user_salt = substr(md5(md5(time())), 0, 8);
        $salt_pass = md5($mypassword . ":::" . $user_salt);
        $regtime = time();

        //сохраняем в бд
        $sql = "INSERT INTO t_users SET user_login = '$myusername', user_passhash = '$salt_pass', user_salt = '$user_salt', user_email = '$myemail', user_regdate = $regtime";
        $result = mysqli_query($db, $sql);

        return $result;
    }
}
