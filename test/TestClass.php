<?php

/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 11:08
 * |  Mail: Overcome.wan@Gmail.com
 * '------------------------------------------------------------------------------------------------------------------*/

spl_autoload_register('autoload1');
spl_autoload_register('autoload2');

Test1Class::test();
Test2Class::test();

//function __autoload($class)
//{
//    require_once __DIR__ . '/' . $class . '.php';
//}

function autoload1($class)
{
    require_once __DIR__ . '/' . $class . '.php';
}

function autoload2($class)
{
    require_once __DIR__ . '/' . $class . '.php';
}
