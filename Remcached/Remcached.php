<?php
// error_reporting(E_ALL);
error_reporting(0);
set_time_limit(0);

include_once 'Socket.php';

/**
 * Remcached Cliend
 * @author ruansheng
 */
class Remcached {
	
	/**
	 * Socket 
	 * @var resource
	 */
	private $Socket;
	
	/**
	 * construct
	 */
	public function __construct($ip,$port){
		$this->Socket=new Socket($ip, $port);
	}
	
	/**
	 * get 
	 * @param key string
	 */
	public function get($key){
		$output=$this->Socket->send($key);
		return $output;
	}
	
	/**
	 * set
	 * @param key string
	 * @param value string
	 * @param expire int
	 */
	public function set($key,$value,$expire){
	
	}
	
	/**
	 * rm
	 * @param key string
	 */
	public function rm($key){
	
	}
	
	/**
	 * flush
	 * @param key string
	 */
	public function flush($key){
	
	}
	
}
