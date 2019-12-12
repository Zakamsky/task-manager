<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2019
 * Time: 23:44
 */
define('task_per_page', 3); //todo: что то с этим сделать

class Controller_Main extends Controller{


    function __construct(){
        $this->model = new Model_Main();
        $this->view = new View();
    }


    function action_index(){

//        $data[0] = $this->model->get_data();
//        $total_pages = $this->model->get_totalpages();
        $data = array(
            "tasks" => $this->model->get_data(),
            "total_pages" => $this->model->get_totalpages()
        );

        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
}