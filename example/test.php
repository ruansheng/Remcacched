<?php
require_once '../Remcached/Remcached.php';

$Remcached=new Remcached('127.0.0.1', 6767);
$Remcached->get('test');
