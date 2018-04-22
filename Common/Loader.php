<?php
/**
 *
 *
 *
 *
 *
 *  .-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 11:30
 * |  Mail: Overcome.wan@Gmail.com
 * '------------------------------------------------------------------------------------------------------------------*/

namespace Common;


class Loader
{
    public static function autoload($class)
    {
        // $class 打印结果为： string(13) "Common\Object"
        $file = BASEDIR.'/'.str_replace('\\','/',$class).'.php'; // 使用转义字符 \ 转换 '\' 为 '/'
        require $file;
    }
}