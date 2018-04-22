<?php

/**.-------------------------------------------------------------------------------------------------------------------
 * |  Github: https://github.com/Tinywan
 * |  Blog: http://www.cnblogs.com/Tinywan
 * |--------------------------------------------------------------------------------------------------------------------
 * |  Author: Tinywan(ShaoBo Wan)
 * |  DateTime: 2018/4/22 14:12
 * |  Mail: Overcome.wan@Gmail.com
 * '------------------------------------------------------------------------------------------------------------------*/

namespace Common\DataBase;

use Common\IDateBase;

class MySQL implements IDateBase
{
    protected $_conn;

    public function connect($host, $user, $passwd, $dbname)
    {
        // TODO: Implement connection() method.
        $conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname);
        $this->_conn = $conn;
    }

    public function query($sql)
    {
        // TODO: Implement query() method.
        $res = mysql_query($sql, $this->_conn);
        return $res;
    }

    public function close()
    {
        // TODO: Implement close() method.
        mysql_close($this->_conn);
    }
}