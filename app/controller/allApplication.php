<?php
$db =include __DIR__ . '/../model/database/start.php';
include __DIR__ . '/../model/Application.php';
use App\Model\Application;

$newApplication = new Application($db);
$customers = $newApplication->getAll('customer');

require_once __DIR__ . '/../view/all.php';