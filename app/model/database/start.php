<?php
$config  =  include  __DIR__  .  '/../database/config.php' ;
require_once __DIR__ . '/../database/QueryBuilder.php';
require_once __DIR__ . '/../database/Connection.php';
use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;
return new  QueryBuilder (
	Connection:: make ( $config ['db'])
);