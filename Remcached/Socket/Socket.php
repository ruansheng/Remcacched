<?php

/**
 * Socket
 * @author ruansheng
 */
class Socket {
	
	/**
	 * ip
	 * @var string
	 */
	private $ip = "127.0.0.1";
	
	/**
	 * port
	 * @var int
	 */
	private $port = 8887;
	
	/**
	 * Socket handler
	 * @var resource
	 */
	private $handler;
	
	/**
	 * construct
	 * @param string $ip
	 * @param int $port
	 */
	public function __construct($ip,$port){
		$this->ip=$ip;
		$this->port=$port;
		
// 		$this->createSocket();
// 		$this->connectSocket();
	}
	
	/**
	 * create Socket
	 */
	private function createSocket(){
		$this->handler = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($this->handler < 0) {
			echo "socket_create() failed: reason: " . socket_strerror($this->handler) . "\n";
		}
	}
	
	/**
	 * connect Socket
	 */
	private function connectSocket(){
		$result = socket_connect($this->handler, $this->ip, $this->port);
		if ($result < 0) {
			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
		}
	}
	
	/**
	 * send 
	 */
	public function send($in){
		if(!socket_write($this->handler, $in, strlen($in))) {
			echo "socket_write() failed: reason: " . socket_strerror($this->handler) . "\n";
		}
		
		$out = '';
		while($out = socket_read($this->handler, 8192)) {
			echo $out;
		}
		$this->closeSocket();
		return $out;
	}
	
	/**
	 * close
	 */
	private function closeSocket(){
		socket_close($this->handler);
	}
}