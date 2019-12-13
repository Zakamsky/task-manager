<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2019
 * Time: 23:23
 */
class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    // дефолтный экшен
    function action_index()
    {
    }
}