<?php

class MySql
{
    private $db;
    private $result;

    public function __construct()
    {
        $conf = Yaf\Registry::get('config')->toArray()['mock'];
        $host = $conf['host'];
        $name = $conf['name'];
        $this->db = new PDO("mysql:host=$host;dbname=$name", $conf['user'], $conf['pass']);
    }

    public function query($sql, $fetchAll = true)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        if ($fetchAll == true) {
            $this->result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $this->result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $this->result;
    }

    public function add($dict, $table)
    {
        $field = '';
        $value = '';

        foreach ($dict as $k => $v) {
            $field .= $k . ',';
            $value .= $v . ',';
        }

        $field = rtrim($field, ',');
        $value = rtrim($value, ',');

        $sql = "INSERT INTO $table ($field) VALUES ($value)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function update($dict, $condition, $table)
    {
        $modify = '';
        foreach ($dict as $k => $v) {
            $modify .= $k . '=' . $v . ',';
        }
        $modify = rtrim($modify, ',');
        $sql = "UPDATE $table SET $modify WHERE $condition";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }

    public function delete($sql)
    {

    }
}