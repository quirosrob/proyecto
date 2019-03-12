<?php
namespace salfadeco;

class Singleton
{
    private static $instances = array();
    protected function __construct() {}
    protected function __clone() {}
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }
	
	public function init(){}

    public static function getInstance()
    {
        $cls = get_called_class();
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static;
			self::$instances[$cls]->init();
        }
        return self::$instances[$cls];
    }
}

