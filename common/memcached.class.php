<?php
// require_once('memcached.class.php');
class memcached_cache
{
    var $mem;
    public function __construct(){
    	$datapath = str_replace("/common", '/', dirname(__FILE__));
		$configpath = $datapath . '/data/memcache.php';
		if (file_exists($configpath)) {
    		require($configpath);
    		 if ($use_memcache == 1) {
    		 	$this->mem = new Memcached;  //声明一个新的memcached链接
		        $this->mem->setOption(Memcached::OPT_COMPRESSION, false); //关闭压缩功能
		        $this->mem->setOption(Memcached::OPT_BINARY_PROTOCOL, true); //使用binary二进制协议
		        $this->mem->setOption(Memcached::OPT_TCP_NODELAY, true); //重要，php memcached有个bug，当get的值不存在，有固定40ms延迟，开启这个参数，可以避免这个bug
		        $this->mem->addServer($memcache_host,  $memcache_port);
    		 }
		}
    }
    //写入缓存
    function __set($key, $val)
    {
        $this->set($key, $val);
    }

    //第三个参数为过期时间
    function set($key, $val, $limit_time = null)
    {
    	$this->mem->set($key,$val,$limit_time);
    }

    //读取缓存
    function __get($key)
    {
        return $this->get($key);
    }

    function get($key)
    {
    	return $this->mem->get($key);
    }

    //删除缓存文件
    function __unset($key)
    {
        return $this->_unset($key);
    }

    function _unset($key)
    {
        return $this->mem->delete($key);
    }

    //检查缓存是否存在，过期则认为不存在
    function __isset($key)
    {
        return $this->_isset($key);
    }

    function _isset($key)
    {
        return;
    }

    //清除过期缓存文件
    function clear()
    {
    	return true;
        // $files = scandir($this->cache_dir);
        // foreach ($files as $val) {
        //     if (filemtime($this->cache_dir . "/" . $val) < time()) {
        //         @unlink($this->cache_dir . "/" . $val);
        //     }
        // }
    }

    //清除所有缓存文件
    public function clear_all()
    {
    	return $this->mem->flush();
        // $files = scandir($this->cache_dir);
        // foreach ($files as $val) {
        //     @unlink($this->cache_dir . "/" . $val);
        // }
    }

    function error($msg, $debug = false)
    {
        $err = new Exception($msg);
        $str = "<pre>
<span style='color:red'>error:</span>
" . print_r($err->getTrace(), 1) . "
</pre>";
        if ($debug == true) {
            file_put_contents(date('Y-m-d H_i_s') . ".log", $str);
            return $str;
        } else {
            die($str);
        }
    }
    
    function quit(){
        return $this->mem->quit();
    }
    // function __destruct(){
    //     $this->mem->quit();
    // }
    // function local_mkdirs($path)
    // {
    //     if (!is_dir($path)) {
    //         $this->local_mkdirs(dirname($path));
    //         mkdir($path);
    //     }
    //     return is_dir($path);
    // }
}

?>