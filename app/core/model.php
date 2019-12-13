<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2019
 * Time: 23:22
 */
class Model{

    protected static function db(){
       return  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    }

    public function get_data($data = null)
    {
    }
}
