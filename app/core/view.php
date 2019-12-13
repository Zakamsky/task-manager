<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.12.2019
 * Time: 23:23
 */
class View
{

    function generate($content_view, $template_view, $data = null)
    {

        include 'app/views/'.$template_view;
    }
}