<?php
/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 13:28
 * |  Mail: Overcome.wan@Gmail.com
 * |  Function: 注册树模式
 * '------------------------------------------------------------------------------------------------------------------*/

namespace Common;


class Register
{
    protected static $object = [];

    public static function set($alias, $object)
    {
        self::$object[$alias] = $object;
    }

    public function get($name)
    {
        return self::$object[$name];
    }

    public function _unset($alias)
    {
        unset(self::$object[$alias]);
    }

}