<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.time
 */

namespace Ceive\Time;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class TimeHelper
 * @package Ceive\Time
 */
class TimeHelper{
	
	/**
	 * @param array $line [string, int, string, int, string, int, string]
	 * int is time
	 * not int is value for return if compliant
	 * @param null $time
	 * @return mixed|null
	 */
	public static function selectInTimeLine(array $line, $time = null){
		$time = $time?:microtime(true);
		for($i=0,$c=count($line); $i < $c;$i++){
			$current = $line[$i];
			if(!is_int($current)){
				$prev = isset($line[$i - 1])?$line[$i - 1]:null;
				$next = isset($line[$i + 1])?$line[$i + 1]:null;
				if( ($prev===null || $time >= $prev) && ($next===null || $time < $next) ){
					return $current;
				}
			}
		}
		return null;
	}
	
	/**
	 * Position between time check
	 * @param array $line [int, '*', int, int]
	 * @param null $time
	 * @return bool|null
	 */
	public static function checkInTimeLine(array $line, $time = null){
		$time = $time?:microtime(true);
		$i = array_search('*', $line);
		if($i !== false){
			$prev = isset($line[$i-1])?$line[$i-1]:null;
			$next = isset($line[$i+1])?$line[$i+1]:null;
			if( ($prev===null || $time >= $prev) && ($next===null || $time < $next) ){
				return true;
			}
		}else{
			return null;
		}
		return false;
	}
	
	
	
	
	/**
	 * Достигнутый период.
	 * Достигнуло ли $time, Срока назначенного со $startCheckpoint на $delay период
	 * @param $startCheckpoint
	 * @param $delay
	 * @param null $time
	 * @return bool
	 *      $reason = 'test reason';
	 *      $delay = 3600; // 1 hour
	 *      $account->lock($delay, $reason);
	 *      Account{
	 *
	 *           protected $locked, $locked_time, $locked_delay, $locked_reason,
	 *
	 *           function lock($delay, $reason){}
	 *
	 *           function isLocked($auto_amnesty){
	 *               if($auto_amnesty && $this->locked && Time::isReached($this->locked_time, $this->locked_delay)){
	 *                   $this->amnesty();
	 *               }
	 *               return $this->locked;
	 *           }
	 *      }
	 */
	public static function isReached($startCheckpoint, $delay, $time = null){
		if($time===null) $time = microtime(true);
		return $delay===null?false:($startCheckpoint >= $time + $delay);
	}
	
	/**
	 * Просроченный период
	 * Прошло ли $time , время назначенное со $startCheckpoint на $delay период
	 * @param $startCheckpoint
	 * @param $delay
	 * @param null $time
	 * @return bool
	 */
	public static function isOverdue($startCheckpoint, $delay, $time = null){
		if($time===null) $time = microtime(true);
		return $delay===null?false:($startCheckpoint > $time + $delay);
	}
	
	/**
	 * Время, которое прошло спустя $checkpoint
	 * @param $checkpoint
	 * @param null $time
	 * @return mixed|null
	 */
	public static function getElapsedOf($checkpoint , $time = null){
		if($time===null) $time = microtime(true);
		return $time>$checkpoint?$time - $checkpoint:null;
	}
	
	/**
	 * Время, которое осталось до $checkpoint
	 * @param $checkpoint
	 * @param null $time
	 * @return mixed|null
	 */
	public static function getRemainsOf($checkpoint, $time = null){
		if($time===null) $time = microtime(true);
		return $checkpoint>$time?$checkpoint - $time:null;
	}
	
	
}


