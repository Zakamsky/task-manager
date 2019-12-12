<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 1:04
 */
class Model_Main extends Model{

    // получает кол-во строк из таблицы заданий, для пагинации.
    public function get_totalpages(){
        global $db; //todo: что то с этим надо сделать

        $rows = mysqli_query($db,"SELECT  count(id) from t_tasks");
        $all_rows = mysqli_fetch_array($rows);
        $total_rows = $all_rows[0];
        $total_pages = ceil ($total_rows / task_per_page);

        return $total_pages;
    }

    public function get_data(){
        global $db; //todo: что то с этим надо сделать
        // составляем запрос в базу
        // все задачи
        $sql = "SELECT * FROM t_tasks";

        //сортировка
        if (isset($_GET['sort'])){
            $sql .= " ORDER BY ".$_GET['sort'];
        };
        if (isset($_GET['order'])){
            $sql .= ' '.$_GET['order'];
        };

        // пагинация:
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $start = ($page -1) * task_per_page;
        $end = task_per_page;

        $sql .= " LIMIT $start ,$end";

        $result = mysqli_query($db,$sql);
        $tasks = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $tasks;
    }
}