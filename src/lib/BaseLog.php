<?php
namespace lib;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;
/**
* 
*/
class BaseLog
{
	protected static $config;
	protected static $class;
	protected static $logtime;
	function __construct()
	{
		if (empty(self::$logtime)) {
			self::$logtime = new \Datetime();
		}
	}
	/**
	*1.确定日志存储方式。
	*2.写日志。
	**/
	static public function init(){
		try {
            self::$config = Yaml::parse(file_get_contents('src/config/config.yml'));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
		//确定日志存储方式
		$drive = self::$config['log']['drive'];
		$class_whole_ns = '\lib\logDrive\\'.$drive.'Log';
		self::$class = new $class_whole_ns;
	}

	static public function log($message, $file='log')
	{
		self::$class->log($message, $file);
	}
}