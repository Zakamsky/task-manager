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
        $db = self::db();

        $rows = mysqli_query($db,"SELECT  count(id) from t_tasks");
        $all_rows = mysqli_fetch_array($rows);
        $total_rows = $all_rows[0];
        $total_pages = ceil ($total_rows / task_per_page);

        return $total_pages;
    }

    public function get_data($get){
        $db = self::db();
        // составляем запрос в базу
        // все задачи
        $sql = "SELECT * FROM t_tasks";

        //сортировка
        if (isset($get['sort'])){
            $sql .= " ORDER BY ".$get['sort'];
        } else{
            $sql .= " ORDER BY task_date";
        };
        if (isset($get['order'])){
            $sql .= ' '.$get['order'];
        };

        // пагинация:
        if(isset($get['page'])){
            $page = $get['page'];
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