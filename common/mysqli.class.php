<?php
class M
{

    private $link; //数据库连接
    private $table; //表名
    private $prefix; //表前缀
    private $db_configarray; //数据库配置
    public static $wlink;//用于外部连接

    /**
     * 参数:表名 数据库配置数组 或 数据库配置文件路径
     * @param $table
     * @param string $db_config_arr_path
     */
    function __construct($table)
    {

        $this->conn();
        $this->table = $this->prefix . $table;
    }

    /**
     * 连接数据库
     */
    private function conn()
    {
        require(dirname(__FILE__) . '/../data/config.php');

        $db_name = $dbname;
        $db_encode = 'utf8';
        $this->prefix = 'weixin_';
        $this->link = mysqli_connect("{$host}", $user, $pwd,$db_name,$port) or die('数据库服务器连接错误:' .mysqli_connect_errno(). mysqli_connect_error());
        mysqli_query($this->link,"set names '$db_encode'");
    }

    /**
     * 数据查询
     * 参数:sql条件 查询字段 使用的sql函数名
     * @param string $where
     * @param string $field
     * @param string $fun
     * @return array
     * 返回值:结果集 或 结果(出错返回空字符串)
     */
    public function select($where = '1', $field = "*", $fun = '', $type = 'assoc',$join='')
    {
        $rarr = array();
        if (empty($fun)) {
            $sqlStr = "select $field from $this->table $join where $where";
            //echo $sqlStr;die;
            $rt = mysqli_query($this->link,$sqlStr);
            if ($type == "row") {
                while ($rt && $arr = mysqli_fetch_row($rt)) {
                    array_push($rarr, $arr);
                }
            } else {
                while ($rt && $arr = mysqli_fetch_assoc($rt)) {
                    array_push($rarr, $arr);
                }

            }
        } else {
            $sqlStr = "select $fun($field) as rt from $this->table $join where $where";
            $rt = mysqli_query($this->link,$sqlStr);
            if ($rt) {
                if ($type == "row") {
                    $arr = mysqli_fetch_row($rt);
                } else {
                    $arr = mysqli_fetch_assoc($rt);
                }
                $rarr = $arr['rt'];
            } else {
                $rarr = '';
            }
        }
        return $rarr;
    }

    /**
     * 数据查询
     * 参数:sql条件 查询字段 使用的sql函数名
     * @param string $where
     * @param string $field
     * @param string $fun
     * @return array
     * 返回值:结果集 或 结果(出错返回空字符串)
     */
    public function find($where = '1', $field = "*", $fun = '', $type = 'assoc',$join='')
    {
        $rarr = array();
        if (empty($fun)) {
            $sqlStr = "select $field from $this->table $join where $where";
            //echo $sqlStr;die;
            $rt = mysqli_query($this->link,$sqlStr );

            if ($type == "row") {
                $rarr = mysqli_fetch_row($rt);
            } else {
                $rarr = mysqli_fetch_assoc($rt);
            }
        } else {
            $sqlStr = "select $fun($field) as rt from $this->table $join where $where";
             //echo $sqlStr.'f2';
            $rt = mysqli_query($this->link, $sqlStr);
            if ($rt) {
                if ($type == "row") {
                    $arr = mysqli_fetch_row($rt);
                } else {
                    $arr = mysqli_fetch_assoc($rt);
                }
                $rarr = $arr['rt'];
            } else {
                $rarr = '';
            }
        }
		
        return $rarr;
    }
    //取得一行
    public function findarray($where = '1', $field = "*" , $join=''){
        $sqlStr = "select $field from $this->table $join where $where";
        $result=mysqli_query($this->link,$sqlStr);
        $arr = mysqli_fetch_array($result);
        return $arr;
    }
    //取得全部
    public function findall($where = '1', $field = "*" , $join=''){
        $sqlStr = "select $field from $this->table $join where $where";
        $result=mysqli_query($this->link,$sqlStr);
        $arr = mysqli_fetch_assoc($result);
        return $arr;
    }
    // public function selectarray($where = '1', $field = "*" , $join=''){
    //     $sqlStr = "select $field from $this->table $join where $where";
    //     $result=mysqli_query($this->link,$sqlStr);
    //     $arr = mysqli_fetch_row($result);
    //     echo var_export($arr);
    //     return $arr;
        
    // }
    /**
     * 数据更新
     * 参数:sql条件 要更新的数据(字符串 或 关联数组)
     * @param $where
     * @param $data
     * @return bool
     * 返回值:语句执行成功或失败,执行成功并不意味着对数据库做出了影响
     */
    public function update($where, $data)
    {
        $ddata = '';
        if (is_array($data)) {
            while (list($k, $v) = each($data)) {
                if (empty($ddata)) {
                    $ddata = "$k='$v'";

                } else {
                    $ddata .= ",$k='$v'";
                }
            }
        } else {
            $ddata = $data;
        }
        $sqlStr = "update $this->table set $ddata where $where";
        // echo $sqlStr;
        return mysqli_query($this->link,$sqlStr);
    }

    /**
     * 数据添加
     * 参数:数据(数组 或 关联数组 或 字符串)
     * @param $data
     * @return int
     * 返回值:插入的数据的ID 或者 0
     */
    public function add($data)
    {
        $field = '';
        $idata = '';
//        echo var_export(array_keys($data));
//        echo var_export(range(0, count($data) - 1));
        if (is_array($data) && array_keys($data) != range(0, count($data) - 1)) {
            //关联数组
            while (list($k, $v) = each($data)) {
                if (empty($field)) {
                    $field = "$k";
                    $idata = "'$v'";
                } else {
                    $field .= ",$k";
                    $idata .= ",'$v'";
                }
            }
            $sqlStr = "insert into $this->table($field) values ($idata)";
        } else {
            //非关联数组 或字符串
            if (is_array($data)) {
                while (list($k, $v) = each($data)) {
                    if (empty($idata)) {
                        $idata = "NULL";
                    } else {
                        $idata .= ",'$v'";
                    }
                }

            } else {
                //为字符串
                $idata = $data;
            }
            $sqlStr = "insert into $this->table values ($idata)";
            
        }

        if (mysqli_query($this->link,$sqlStr)) {
            return mysqli_insert_id($this->link);
        }
        return 0;
    }

    /**
     * 数据添加
     * 参数:数据(数组 或 关联数组 或 字符串)
     * @param $data
     * @return int
     * 返回值:插入的数据的ID 或者 0
     */
    public function add_new($data)
    {
        $field = '';
        $idata = '';
        if (is_array($data)) {
            //关联数组
            while (list($k, $v) = each($data)) {
                if (empty($field)) {
                    $field = "$k";
                    $idata = "'$v'";
                } else {
                    $field .= ",$k";
                    $idata .= ",'$v'";
                }
            }
            $sqlStr = "insert into $this->table($field) values ($idata)";
        }

        if (mysqli_query($this->link,$sqlStr)) {
            return mysqli_insert_id($this->link);
        }
    }

    public function insert_id(){
        return mysqli_insert_id($this->link);
    }
    /**
     * 执行sql语句
     *
    */
    public function query($sql){
        return mysqli_query($this->link,$sql);
    }
    /**
     * 数据删除
     * 参数:sql条件
     * @param $where
     * @return bool
     */
    public function delete($where)
    {
        $sqlStr = "delete from $this->table where $where";
        return mysqli_query($this->link,$sqlStr);
    }
    /**
     * 显示数据库
     * 参数:sql条件
     * @param $sql sql语句
     * @return array
     * 返回值:结果集 或 结果(出错返回空字符串)
     */
    public function showdatabase($sql){

    }
    /**
     * 关闭MySQL连接
     * @return bool
     */
    public function close()
    {
        return mysqli_close($this->link);
    }

}
