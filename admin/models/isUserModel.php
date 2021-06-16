<?php


namespace admin\models;


use catalog\routes\route;

class isUserModel extends route
{
    function __construct(){
        if (isset($_SESSION['admin']) || isset($_SESSION['manager']))
            $this->is_admin = true;
        elseif (!isset($_SESSION['admin']) && !isset($_SESSION['manager']))
            $this->is_admin = false;
    }
}