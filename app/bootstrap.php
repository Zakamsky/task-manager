<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2019
 * Time: 22:55
 */

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'beejeetest_bjtdb');
define('DB_PASSWORD', 'beejeetest-der-password');
define('DB_DATABASE', 'beejeetest_bjtdb');

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор