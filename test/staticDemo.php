<?php

/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/5/1 9:40
 * |  Mail: Overcome.wan@Gmail.com
 * |  Fun: php延迟静态绑定是什么？http://www.php.cn/php-weizijiaocheng-374583.html
 * '------------------------------------------------------------------------------------------------------------------*/
class DBHandler
{
    public static function create()
    {
        echo 'create';
        return new  static();
    }

    public function get()
    {

    }
}

class MySQLHandler extends DBHandler
{
    public function get()
    {
        echo "MySQL get()";
    }
}

class MemcachedHandler extends DBHandler
{
    public function get()
    {
        echo "Memcached get";
    }
}

function get(DBHandler $handler)
{
    $handler->get();
}

$dbHandler = MySQLHandler::create();
get($dbHandler);

abstract class base
{
    public static function create()
    {
        //return new self();
        return new static();
    }
}

class aClass extends base
{
}

class bClass extends base
{
}

var_dump(aClass::create());
var_dump(bClass::create());

$a = 'apple';
$b = &$a;
//var_dump($a,$b);

/* PHP不使用速算扣除数计算个人所得税
 * @author 吴先成
 * @param float $salary 含税收入金额
 * @param float $deduction 保险等应当扣除的金额 默认值为0
 * @param float $threshold 起征金额 默认值为3500
 * @return float | false 返回值为应缴税金额 参数错误时返回false
*/
function getPersonalIncomeTax($salary, $deduction = 0, $threshold = 3500)
{
    if (!is_numeric($salary) || !is_numeric($deduction) || !is_numeric($threshold)) {
        return false;
    }
    if ($salary <= $threshold) {
        return 0;
    }
    $levels = [1500, 4500, 9000, 35000, 55000, 80000, PHP_INT_MAX];
    $rates = [0.03, 0.1, 0.2, 0.25, 0.3, 0.35, 0.45];
    $taxableIncome = $salary - $threshold - $deduction;
    $tax = 0;
    foreach ($levels as $k => $level) {
        $previousLevel = isSet($levels[$k - 1]) ? $levels[$k - 1] : 0;
        if ($taxableIncome <= $level) {
            $tax += ($taxableIncome - $previousLevel) * $rates[$k];
            break;
        }
        $tax += ($level - $previousLevel) * $rates[$k];
    }
    $tax = round($tax, 2);
    return $tax;
}

/* 示例 */
echo getPersonalIncomeTax(13000);
//运行结果：762.22