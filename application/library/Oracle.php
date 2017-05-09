<?php

class Oracle
{
    private $conn;

    public function __construct($env, $bizType)
    {
        $conf = Yaf\Registry::get('config')->toArray();
        $host = $conf[$env][$bizType]['host'];
        $user = $conf[$env][$bizType]['user'];
        $pwd = $conf[$env][$bizType]['pwd'];
        $name = $conf[$env][$bizType]['name'];

        $this->conn = oci_connect($user, $pwd, "$host/$name");
        if (!$this->conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    }

    public function update($fieldArr, $condition, $table)
    {
        $fieldSet = '';
        foreach ($fieldArr as $k => $v) {
            $fieldSet .= "$k=$v,";
        }
        $fieldSet = rtrim($fieldSet, ',');

        $sql = "update $table set $fieldSet where $condition";
        $stmt = oci_parse($this->conn, $sql);
        return oci_execute($stmt);
    }

    public function insert()
    {

    }

    public function query($sql)
    {
        $stmt = oci_parse($this->conn, $sql);
        oci_execute($stmt);
        $data = [];
        while (($row = oci_fetch_assoc($stmt)) != false) {
            $data[] = $row;
        }
        return $data;
    }
}