<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 20:47
 */
class Model_Login extends Model{

    public function get_user($myusername){
        $db = self::db();

        $username = mysqli_real_escape_string($db, $myusername);

        $sql = "SELECT * FROM t_users WHERE user_login = '$username'";
        $result = mysqli_query($db,$sql);
        $user = mysqli_fetch_array($result,MYSQLI_ASSOC);

        return $user;
    }
}