<?php
namespace lib\logDrive;
use lib\BaseLog;
/**
* 
*/
class fileLog extends BaseLog
{

	static function log($message, $file='log')
	{
		$path = self::$config['log']['path'];
		if(!is_dir($path.self::$logtime->format('YmdH')))
		{
			mkdir($path.self::$logtime->format('YmdH'), 0777, true);
		}
		return file_put_contents($path.self::$logtime->format('YmdH').'/'.$file.'.log', self::$logtime->format('Y-m-d H:i:s').$message.PHP_EOL, FILE_APPEND);
	}

}