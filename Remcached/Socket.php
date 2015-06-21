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
	private $port = 8889;
	
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
		$this->createSocket();
		$this->connectSocket();
	}
	
	/**
	 * create Socket
	 */
	private function createSocket(){
		$this->handler = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);  //SOL_TCP
		if ($this->handler < 0) {
			echo "socket_create() failed.\nreason: " . socket_strerror($this->handler) . "\n";
			exit;
		}
	}
	
	/**
	 * connect Socket
	 */
	private function connectSocket(){
		$result = socket_connect($this->handler, $this->ip, $this->port);
		if ($result < 0) {
			echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
			exit;
		}
	}
	
	/**
	 * send 
	 */
	public function send($in){
		if(!socket_write($this->handler, $in, strlen($in))) {
			echo "socket_write() failed: reason: " . socket_strerror($this->handler) . "\n";
			exit;
		}
		
		$out = '';
		while($out = socket_read($this->handler, 8192)) {
			echo "read...".PHP_EOL;
            echo $out.PHP_EOL;
			$out.=$out;
		}
        echo $out.PHP_EOL;
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
