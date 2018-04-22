<?php
/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 12:23
 * |  Mail: Overcome.wan@Gmail.com
 * '------------------------------------------------------------------------------------------------------------------*/

namespace Common;


interface IDateBase
{
    function connect($host,$user,$passwd,$dbname);
    function query($sql);
    function close();
}

class DataBase
{
    protected static $db;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$db) {
            return self::$db;
        } else {
            self::$db = new self();
            return self::$db;
        }
    }

    public function where($where)
    {
        return $this; // 链式查询
    }

    public function order($order)
    {
        return $this; // 链式查询
    }

    public function limit($limit)
    {
        return $this; // 链式查询
    }
}