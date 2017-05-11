<?php

class ManageApiModel
{
    const apiInfoTable = 'apiInfo';
    private $db;

    public function __construct()
    {
        $this->db = new MySql();
    }

    public function queryApiInfo($condition = '')
    {
        $sql = "SELECT * FROM " . self::apiInfoTable . " WHERE 1=1 $condition ORDER BY id DESC";
        return $this->db->query($sql);
    }

    public function addApiInfo($dataArr)
    {
        return $this->db->add($dataArr, self::apiInfoTable);
    }

    public function deleteApiInfoById($id)
    {
        return $this->db->delete("id=$id", self::apiInfoTable);
    }
}