<?php

/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 11:27
 * |  Mail: Overcome.wan@Gmail.com
 * |  Function: __get/__set：类的属性魔术方法，当外部访问私有或者未定义属性时自动调用
 * '------------------------------------------------------------------------------------------------------------------*/

namespace Common;

class Object
{
    // 对象属性的访问映射到以上数组
    protected $array = [];

    public function __set($key, $value)
    {
        echo __METHOD__."\n";
        $this->array[$key] = $value;
    }

    public function __get($key)
    {
        echo __METHOD__."\n";
        return $this->array[$key];
    }

    public function __call($name, $arguments)
    {
        return "Implement __call() method \n";
    }

    public static function __callStatic($name, $arguments)
    {
        return "Implement __callStatic() method \n";
    }

    /**
     * 将类的对象当成字符串使用时自动调用
     * eg:
     *  $a = new A();
     *  echo $a;
     * @return string
     */
    public function __toString()
    {
        return "Implement __toString() method \n";
    }

    /**
     * 将类的对象当成函数使用时自动调用
     * eg:
     *  $a = new A();
     *  echo $a();
     * @return string
     */
    public function __invoke()
    {
        return "Implement __invoke() method \n";
    }
}