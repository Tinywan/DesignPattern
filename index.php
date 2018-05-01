<?php
/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 11:22
 * |  Mail: Overcome.wan@Gmail.com
 * |  function: 入口文件
 * '------------------------------------------------------------------------------------------------------------------*/

// 定义项目根目录
define('BASEDIR', __DIR__);
include BASEDIR . '/Common/Loader.php';
spl_autoload_register('\\Common\\Loader::autoload');

//$db = new \Common\DataBase\Pdo();
//$db->connect('127.0.0.1','root','root','test');
//$res = $db->query('show databases');
//var_dump($res);
$obj = new \Common\Object();
var_dump(\Common\Object::GO("1111111111"));



