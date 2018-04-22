<?php
/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 12:50
 * |  Mail: Overcome.wan@Gmail.com
 * |  Mail: 工厂模式
 * '------------------------------------------------------------------------------------------------------------------*/

namespace Common;


class Factory
{
    public static function createDataBase()
    {
        //$db = new DataBase();
        $db = DataBase::getInstance(); // 使用单例模式
        return $db;
    }
}