<?php

/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 11:27
 * |  Mail: Overcome.wan@Gmail.com
 * '------------------------------------------------------------------------------------------------------------------*/

namespace Common;

class Object
{
    // 对象属性的访问映射到以上数组
    protected $data = [];

    /**
     * @var integer
     */
    private $age;

    /**
     * 当外部定义不可访问属性赋值时自动调用
     * @param $key
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * 当外部读取不可访问属性的值时自动调用
     * @param $key
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    /**
     * 检测成员属性是否已设置并且非 NULL
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    /**
     * 当外部访问对象中调用一个不可访问方法时候自动调用
     * @param $name
     * @param $arguments
     * @return string
     */
    public function __call($name, $arguments)
    {
        // 注意: $name 的值区分大小写
        return "Calling object method '$name' "
            . implode(', ', $arguments) . "\n";
    }

    /**
     * 当外部访问对象中调用一个静态不可访问方法时候自动调用
     * @param $name
     * @param $arguments
     * @return string
     */
    public static function __callStatic($name, $arguments)
    {
        // 注意: $name 的值区分大小写
        echo "Calling static method '$name' "
            . implode(', ', $arguments) . "\n";
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