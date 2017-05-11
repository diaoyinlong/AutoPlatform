<?php

class ManageApiModel
{
    const apiInfoTable = 'apiInfo';

    public function queryApiInfo($condition = '')
    {
        $db = new MySql();

        $sql = "SELECT * FROM " . self::apiInfoTable . " WHERE 1=1 $condition ORDER BY id DESC";
        return $db->query($sql);
    }

    public function addApiInfo($dataArr)
    {
        $db = new MySql();
        return $db->add($dataArr, self::apiInfoTable);
    }
}