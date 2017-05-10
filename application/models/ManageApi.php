<?php

class ManageApiModel
{
    public function queryApiInfo($condition = '')
    {
        $db = new MySql();
        $sql = "SELECT * FROM apiInfo WHERE 1=1 $condition ORDER BY id DESC";
        return $db->query($sql);
    }
}