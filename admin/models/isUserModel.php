<?php


namespace admin\models;


class isUserModel
{
    function __construct(){
        if (isset($_SESSION['admin']))
            $this->is_admin = true;
        else
            $this->is_admin = false;
        if (isset($_SESSION['manager']))
            $this->is_manager = true;
        else
            $this->is_manager = true;
    }
}