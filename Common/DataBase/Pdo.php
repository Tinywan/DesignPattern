<?php

/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 14:12
 * |  Mail: Overcome.wan@Gmail.com
 * |  Function: PDO连接
 * '------------------------------------------------------------------------------------------------------------------*/

namespace Common\DataBase;

class Pdo
{
    protected $_conn;

    public function connect($host, $user, $passwd, $dbname)
    {
        try {
            $this->_conn = new \PDO("mysql:host=${host};dbname=${dbname}", $user, $passwd,[\PDO::ATTR_PERSISTENT]);
        } catch (\PDOException $e) {
            return "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public function query($sql)
    {
        return $this->_conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function close()
    {
        return $this->_conn = null;
    }
}