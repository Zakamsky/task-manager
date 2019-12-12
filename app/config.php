<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01.12.2019
 * Time: 16:20
 */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'beejeetest_bjtdb');
define('DB_PASSWORD', 'beejeetest-der-password');
define('DB_DATABASE', 'beejeetest_bjtdb');
//define('DB', mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE));
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (!DB) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Соединение с MySQL установлено!!!" . PHP_EOL;
//echo "Информация о сервере: " . mysqli_get_host_info($$db) . PHP_EOL;

mysqli_close($connect);