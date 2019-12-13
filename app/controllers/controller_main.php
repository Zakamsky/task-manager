<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2019
 * Time: 23:44
 */
define('task_per_page', 3);

class Controller_Main extends Controller{


    function __construct(){
        $this->model = new Model_Main();
        $this->view = new View();
    }


    function action_index(){

        $get = array();

        if (isset($_GET['sort'])){
            $get['sort'] = $_GET['sort'];
        };
        if (isset($_GET['order'])){
            $get['order'] = $_GET['order'];
        };

        if(isset($_GET['page'])){
            $get['page'] = $_GET['page'];
        }

        $data = array(
            "tasks" => $this->model->get_data($get),
            "total_pages" => $this->model->get_totalpages()
        );

        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
}