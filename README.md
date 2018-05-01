# 简介

通过实际的代码演示PHP的11种面向对象设计模式实现和使用，帮助PHPer具备使用设计模式解决工程中复杂逻辑的能力，并且对OOP中松耦合、依赖倒置、可替换性、配置化等哲学有一定了解。

## 命名空间
命名空间一个最明确的目的就是解决重名问题，PHP中不允许两个函数或者类出现相同的名字，否则会产生一个致命的错误。

```php
require_once 'test1.php';
require_once 'test2.php';

Test1\test();
Test2\test();
```

## 面向对象的高级特性  

### 一、PSR - 0 开发规范  
* 1、命名空间必须与绝对路径一致
* 2、类名首字母必须大写
* 3、除入口文件外，其他“.php”必须只有一个类
* 4、单一入口
* 5、类中不能有任何可执行代码
* 6、所有的类是自动载入，不能用`require`或者`include`

### 二、类自动载入的方法
   1、spl_autoload_register("path");
   
   
   APPA 功能逻辑业务代码
   MODEL 与业务逻辑无关的公共类
   
## PHP SPL（PHP 标准库）
#### 
官网地址：[https://secure.php.net/manual/zh/book.spl.php](https://secure.php.net/manual/zh/book.spl.php)
#### 什么是SPL？
SPL是用于解决典型问题(standard problems)的一组接口与类的集合。（出自：http://php.net/manual/zh/intro.spl.php） 
SPL，PHP 标准库（Standard PHP Library） ，从 PHP 5.0 起内置的组件和接口，且从 PHP5.3 已逐渐的成熟。SPL 在所有的 PHP5 开发环境中被内置，同时无需任何设置。   
## 数据结构
### 栈
SplStack类通过使用一个双向链表来提供栈的主要功能


```php
// 栈 - 先进后出
$stack = new SplStack();

//入栈
$stack->push("user01 \n");
$stack->push("user02 \n");

//出栈
echo $stack->pop(); // user02
echo $stack->pop(); // user01


//队列 - 先进先出，后进后出
$queue = new SplQueue();

//入队列
$queue->enqueue("user11 \n");
$queue->enqueue("user12 \n");
$queue->enqueue("user13 \n");

//出队列
echo $queue->dequeue(); // user11
echo $queue->dequeue(); // user12
echo $queue->dequeue(); // user13

// 堆
$heap = new SplMinHeap();
$heap->insert("user011 \n");
$heap->insert("user012 \n");

echo $heap->extract();
echo $heap->extract();
```
## PHP链式操作的实现

通过`ruturn $this`来完成链式操作

## PHP魔术方法的使用

###### `__get/__set`

类的属性魔术方法，当外部访问私有或者未定义属性时自动调用  

###### `__call/__callStatic`

类的方法魔术方法，当外部访问私有或者未定义方法以及静态方法的时候自动调用  __callStatic也必须声明为static  

###### `__toString`

将类的对象当成字符串使用时自动调用  

###### `__invoke`

将类的对象当成函数使用时自动调用  

###### stati绑定的都是后期子类    self绑定的本身

自 PHP 5.3.0 起，PHP 增加了一个叫做后期静态绑定的功能，用于在继承范围内引用静态调用的类。

```php
<?php
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        static::who(); // 后期静态绑定从这里开始
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test(); // B
```
## 基础设计模式简介 

本章节主要对工厂模式、单例模式和注册树模式进行了基本的介绍，并通过实际案例详细讲解了这三种设计模式的实现以及适用场合。

### 工厂模式

工厂模式分为：简单工厂模式、工厂方法模式、抽象工厂模式。

#### 案例

* 如：工厂模式直接调用单例模式

* 简单工厂模式：通过静态方法创建对象。可以理解成，只负责生产同一等级结构中的任何一个产品，但是不能新增产品。

* 工厂方法模式：去掉了简单工厂模式中方法的静态属性，使其可以被子类集成，定义一个创建对象的接口，让子类去决定实例化哪个类。可以理解成，用来生产同一等级结构中的固定产品，但是支持增加产品。

* 抽象工厂模式：提供一个创建一系列相关或者相互依赖的对象的接口。可以理解成，用来生产不用类型的全部产品，但是不能增加新品，支持增加新的类型。

* 单例模式

* 注册树模式

### 适配器模式
####　应用场景
适配器模式（有时候也称包装样式或者包装）将一个类的接口适配成用户所期待的。一个适配允许通常因为接口不兼容而不能在一起工作的类工作在一起。
####　应用场景
如程序数据库有关联mysql、mysqli、pdo、sqlite、postgresql等操作，而你需要根据情况换数据库操作时，可以使用适配器模式统一接口，这样代码中除了数据库配置之外，就不需要做而外的更改。

同理cache（缓存）的场景也是，无论使用memcache还是redis等，在更换的时候都会很方便，节约时间。

注：在一些流行框架中都可以看到此模式，详情请自行参阅框架源码。

#### 实现

* [PHP设计模式之适配器模式](https://segmentfault.com/a/1190000007508128)

