<?php
/**
 * @created Alexey Kutuzov <lexus27.khv@gmail.com>
 * @Project: ceive.time
 */

namespace Ceive\Time;

/**
 * @Author: Alexey Kutuzov <lexus27.khv@gmail.com>
 * Class DateTime
 * @package Ceive\Time
 */
class DateTime extends \DateTime{
	
	const PH_MONTH_DAY_NUM              = 'j'; // 1 - 28...31
	
	const PH_MONTH_DAY_NUM_SUFFIX       = 'S'; // st, nd, rd, th
	const PH_MONTH_DAY_NUM_DOUBLE       = 'd'; // 01 ... 31
	
	
	
	
	const PH_WEEKDAY_NAME               = 'l'; // Monday ... Sunday
	const PH_WEEKDAY_NAME_SHORT         = 'D'; // Mon ... Sun
	
	const PH_WEEKDAY_NUM_ISO            = 'N'; // 1 - 7 (Mon ... Sun)
	const PH_WEEKDAY_NUM                = 'w'; // 0 - 6 (Sun ... Sat)
	
	const PH_MONTH_NAME                 = 'F'; // January ... December
	const PH_MONTH_NAME_SHORT           = 'M'; // Jan ... Dec
	const PH_MONTH_NUM_DOUBLE           = 'm'; // 01 - 12
	const PH_MONTH_NUM                  = 'n'; // 1 - 12
	
	const PH_MONTH_DAYS                 = 't'; // 28 ... 31
	
	
	
	const PH_WEEK_IN_YEAR               = 'W'; // 0 - 42
	const PH_DAY_IN_YEAR                = 'z'; // 0 - 365
	
	const PH_YEAR_LEAP                  = 'L'; // 0 | 1
	const PH_YEAR_NUM                   = 'Y'; // 1999 2002
	const PH_YEAR_NUM_ISO               = 'o'; // 1999 2002
	const PH_YEAR_NUM_SHORT             = 'Y'; // 99 03
	
	const PH_TIME_MERIDIEM_LOWERCASE    = 'a'; // am pm
	const PH_TIME_MERIDIEM_UPPERCASE    = 'A'; // AM PM
	
	const PH_TIME_HOURS_12              = 'g'; // 1...12
	const PH_TIME_HOURS_12_DOUBLE       = 'h'; // 01...12
	
	const PH_TIME_HOURS_24              = 'G'; // 1...24
	const PH_TIME_HOURS_24_DOUBLE       = 'H'; // 01...24
	
	const PH_TIME_MINUTES_DOUBLE        = 'i'; // 01...24
	const PH_TIME_SECONDS_DOUBLE        = 's'; // 01...24
	
	const PH_TIME_MICROSECONDS          = 'u'; // 654321
	const PH_TIME_MILLISECONDS          = 'v'; // 654
	
	const PH_TIMEZONE_CODE              = 'e'; // UTC, GMT, Atlantic/Azores
	const PH_TIMEZONE_CODE_ABBR         = 'T'; // EST, MDT ...
	
	const PH_SUMMERTIME                 = 'I'; // 1|0
	const PH_TIMEZONE_OFFSET            = 'O'; // +0200
	const PH_TIMEZONE_OFFSET_COLON      = 'P'; // +02:00
	const PH_TIMEZONE_OFFSET_SECONDS    = 'Z'; // -43200 to 50400
	
	const PH_UNIX_TIMESTAMP             = 'U'; // -43200 to 50400
	
	const PH_DATETIME_RFC               = 'r'; // RFC2822: Thu, 21 Dec 2000 16:01:07 +0200
	const PH_DATETIME_ISO               = 'c'; // ISO8601: 2004-02-12T15:19:21+00:00
	
	
	/**
	 * @return int
	 */
	public function getMonthDayNum(){
		return intval($this->format(self::PH_MONTH_DAY_NUM));
	}
	
	/**
	 * @return string
	 */
	public function getMonthDayNumDouble(){
		return $this->format(self::PH_MONTH_DAY_NUM_DOUBLE);
	}
	
	/**
	 * @return string
	 */
	public function getMonthDaySuffix(){
		return $this->format(self::PH_MONTH_DAY_NUM_SUFFIX);
	}
	
	/**
	 * @return string
	 */
	public function getWeekdayName(){
		return $this->format(self::PH_WEEKDAY_NAME);
	}
	
	/**
	 * @return string
	 */
	public function getWeekdayNameShort(){
		return $this->format(self::PH_WEEKDAY_NAME_SHORT);
	}
	
	
	/**
	 * @return int
	 */
	public function getDayInYear(){
		return intval($this->format(self::PH_DAY_IN_YEAR));
	}
	
	/**
	 * @return int
	 */
	public function getWeekInYear(){
		return intval($this->format(self::PH_WEEK_IN_YEAR));
	}
	
	
	/**
	 * @return int
	 */
	public function getWeekdayNum(){
		return intval($this->format(self::PH_WEEKDAY_NUM));
	}
	
	/**
	 * @return int
	 */
	public function getWeekdayNumISO(){
		return intval($this->format(self::PH_WEEKDAY_NUM_ISO));
	}
	
	/**
	 * @return string
	 */
	public function getMonthName(){
		return $this->format(self::PH_MONTH_NAME);
	}
	
	/**
	 * @return string
	 */
	public function getMonthNameShort(){
		return $this->format(self::PH_MONTH_NAME_SHORT);
	}
	
	/**
	 * @return int
	 */
	public function getMonthNum(){
		return intval($this->format(self::PH_MONTH_NUM));
	}
	
	const SEASON_WINTER = 'winter';
	const SEASON_SPRING = 'spring';
	const SEASON_SUMMER = 'summer';
	const SEASON_AUTUMN = 'autumn';
	
	const SEASONS = [
		self::SEASON_WINTER,
		self::SEASON_SPRING,
		self::SEASON_SUMMER,
		self::SEASON_AUTUMN,
	];
	
	const SEASON_MONTHS = [
		self::SEASON_WINTER => [12,1,2],
		self::SEASON_SPRING => [3,4,5],
		self::SEASON_SUMMER => [6,7,8],
		self::SEASON_AUTUMN => [9,10,11],
	];
	
	/**
	 * @return int|null|string
	 */
	public function getSeasonName(){
		$m = $this->getMonthNum();
		foreach(self::SEASON_MONTHS as $name => $months){
			if(in_array($m,$months, true)){
				return $name;
			}
		}
		return null;
	}
	
	/**
	 * @param $season
	 * @param int $monthLocalNum
	 * @return mixed
	 * @throws \Exception
	 */
	public function getSeasonMonthNum($season, $monthLocalNum = null){
		if(!$monthLocalNum){
			$monthLocalNum = 1;
		}
		$index = $monthLocalNum - 1;
		$months = self::SEASON_MONTHS;
		if(isset($months[$season][$index])){
			return $months[$season][$index];
		}
		throw new \Exception('Invalid season "'.$season.'" local month index "'.$index.'"');
	}
	
	/**
	 * @return string
	 */
	public function getMonthNumDouble(){
		return $this->format(self::PH_MONTH_NUM_DOUBLE);
	}
	
	/**
	 * @return int
	 */
	public function getMonthDays(){
		return intval($this->format(self::PH_MONTH_DAYS));
	}
	
	
	/**
	 * @return int
	 */
	public function getYearNum(){
		return intval($this->format(self::PH_YEAR_NUM));
	}
	
	/**
	 * @return bool
	 */
	public function isYearLeap(){
		return boolval($this->format(self::PH_YEAR_LEAP));
	}
	
	/**
	 * @return string
	 */
	public function getYearNumShort(){
		return $this->format(self::PH_YEAR_NUM_SHORT);
	}
	
	/**
	 * @return int
	 */
	public function getYearNumISO(){
		return intval($this->format(self::PH_YEAR_NUM_ISO));
	}
	
	/**
	 * @param $day_number
	 * @return $this
	 */
	public function setMonthDay($day_number){
		$this->setDate($this->format(self::PH_YEAR_NUM), $this->format(self::PH_MONTH_NUM), $day_number);
		return $this;
	}
	
	/**
	 * @param $month_number
	 * @return $this
	 */
	public function setMonth($month_number){
		$this->setDate($this->format(self::PH_YEAR_NUM), $month_number, $this->format(self::PH_MONTH_DAY_NUM));
		return $this;
	}
	
	/**
	 * @param $year
	 * @return $this
	 */
	public function setYear($year){
		$this->setDate($year, $this->format(self::PH_MONTH_NUM), $this->format(self::PH_MONTH_DAY_NUM));
		return $this;
	}
	
	/**
	 * @param $hours
	 * @return $this
	 */
	public function setHours($hours){
		$this->setTime(
			$hours,
			$this->format(self::PH_TIME_MINUTES_DOUBLE),
			$this->format(self::PH_TIME_SECONDS_DOUBLE)
		);
		return $this;
	}
	
	/**
	 * @param $minutes
	 * @return $this
	 */
	public function setMinutes($minutes){
		$this->setTime(
			$this->format(self::PH_TIME_HOURS_24),
			$minutes,
			$this->format(self::PH_TIME_SECONDS_DOUBLE)
		);
		return $this;
	}
	
	/**
	 * @param $seconds
	 * @return $this
	 */
	public function setSeconds($seconds){
		$this->setTime(
			$this->format(self::PH_TIME_HOURS_24),
			$this->format(self::PH_TIME_MINUTES_DOUBLE),
			$seconds
		);
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getTimeFullSeconds(){
		return self::convertTimeToSeconds(
			$this->format(self::PH_TIME_HOURS_24),
			$this->format(self::PH_TIME_MINUTES_DOUBLE),
			$this->format(self::PH_TIME_SECONDS_DOUBLE)
		);
	}
	
	/**
	 * @param $hours
	 * @param $minutes
	 * @param $seconds
	 * @return int
	 */
	public static function convertTimeToSeconds($hours, $minutes, $seconds){
		return intval($seconds) + (intval($minutes) * 60) + (intval($hours) * 60 * 60);
	}
	
	/**
	 * @return int
	 */
	public function getHours(){
		return intval($this->format(self::PH_TIME_HOURS_24));
	}
	
	/**
	 * @return string
	 */
	public function getHoursDouble(){
		return $this->format(self::PH_TIME_HOURS_24);
	}
	
	/**
	 * @return int
	 */
	public function getMinutes(){
		return intval($this->format(self::PH_TIME_MINUTES_DOUBLE));
	}
	
	/**
	 * @return string
	 */
	public function getMinutesDouble(){
		return $this->format(self::PH_TIME_MINUTES_DOUBLE);
	}
	
	/**
	 * @return int
	 */
	public function getSeconds(){
		return intval($this->format(self::PH_TIME_SECONDS_DOUBLE));
	}
	
	/**
	 * @return string
	 */
	public function getSecondsDouble(){
		return $this->format(self::PH_TIME_SECONDS_DOUBLE);
	}
	
	/**
	 * @param $format
	 * @param \DateTime|null $border
	 */
	public function modifyBack($format, \DateTime $border = null){
		$borderTimestamp = null;
		if($border){
			$borderTimestamp = $border->getTimestamp();
			if($borderTimestamp > $this->getTimestamp()){
				$border = null;
				$borderTimestamp = null;
			}
		}
		
		$format = ltrim($format,'-+');
		
		$this->modify("-$format");
		if($border && $borderTimestamp > $this->getTimestamp()){
			$this->setTimestamp($borderTimestamp + 1);
		}
	}
	
	/**
	 * @param $format
	 * @param \DateTime|null $border
	 */
	public function modifyForward($format, \DateTime $border = null){
		$borderTimestamp = null;
		if($border){
			$borderTimestamp = $border->getTimestamp();
			if($borderTimestamp < $this->getTimestamp()){
				$border = null;
				$borderTimestamp = null;
			}
		}
		
		$format = ltrim($format,'-+');
		
		$this->modify("+$format");
		if($border && $borderTimestamp < $this->getTimestamp()){
			$this->setTimestamp($borderTimestamp - 1);
		}
	}
	
	/**
	 * Достигнутый период.
	 * Достигнуло ли $time, Срока назначенного со $startCheckpoint на $delay период
	 * @param $startCheckpoint
	 * @param $delay
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
	public function isReached($startCheckpoint, $delay){
		return $delay===null?false:($startCheckpoint >= $this->getTimestamp() + $delay);
	}
	
	/**
	 * Просроченный период
	 * Прошло ли $time , время назначенное со $startCheckpoint на $delay период
	 * @param $startCheckpoint
	 * @param $delay
	 * @return bool
	 */
	public function isOverdue($startCheckpoint, $delay){
		return $delay===null?false:($startCheckpoint > $this->getTimestamp() + $delay);
	}
	
	/**
	 * Время, которое прошло спустя $checkpoint
	 * @param $checkpoint
	 * @return mixed|null
	 */
	public function getElapsedOf($checkpoint){
		$t = $this->getTimestamp();
		return $t>$checkpoint?$t - $checkpoint:null;
	}
	
	/**
	 * Время, которое осталось до $checkpoint
	 * @param $checkpoint
	 * @return mixed|null
	 */
	public function getRemainsOf($checkpoint){
		$t = $this->getTimestamp();
		return $checkpoint>$t?$checkpoint - $t:null;
	}
	
	/**
	 * @param null $timezone
	 * @return DateTime
	 */
	public static function now($timezone = null){
		if($timezone !== null){
			if(is_string($timezone)){
				$timezone = new \DateTimeZone($timezone);
			}
			if(is_int($timezone)){
				$timezone = timezone_name_from_abbr('', $timezone );
				$timezone = new \DateTimeZone($timezone);
			}
		}
		return new self('now', $timezone);
		
	}
	
	/**
	 * @param DateTime|null $comparable
	 * @return bool
	 */
	public function isToday(DateTime $comparable = null){
		if(!$comparable){
			$comparable = new DateTime();
		}
		return $this->getAbsoluteDays() === $comparable->getAbsoluteDays();
	}
	
	/**
	 * @param DateTime|null $comparable
	 * @return bool
	 */
	public function isYesterday(DateTime $comparable = null){
		if(!$comparable){
			$comparable = new DateTime();
		}
		return ($this->getAbsoluteDays()+1) === $comparable->getAbsoluteDays();
	}
	
	/**
	 * @param DateTime|null $comparable
	 * @return bool
	 */
	public function isTomorrow(DateTime $comparable = null){
		if(!$comparable){
			$comparable = new DateTime();
		}
		return $this->getAbsoluteDays() === ($comparable->getAbsoluteDays()+1);
	}
	
	public function getAbsoluteDays(){
		return ($this->getYearNum() * 365) + ($this->getDayInYear());
	}
	
	public function getAbsoluteHours(){
		return ($this->getAbsoluteDays() * 24) + $this->getHours();
	}
	
	public function getAbsoluteWeeks(){
		return ($this->getYearNum() * 42) + ($this->getWeekInYear());
	}
	
	public function getAbsoluteSeconds(){
		return $this->getTimestamp();
	}
	
	public function getAbsoluteYears(){
		return $this->getYearNum();
	}
	
}
