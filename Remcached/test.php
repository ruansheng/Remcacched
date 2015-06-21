<?php
require_once '../Remcached/Remcached.php';

$Remcached=new Remcached('127.0.0.1', 8887);
echo $Remcached->get('test');

