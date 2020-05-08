<?php
declare(strict_types=1);

require('src/Response.php');
require('src/Notification.php');
require('src/UserAgent.php');
require('src/RandomUserAgent.php');
require('src/UrlResponse.php');
require('src/StdNotification.php');
require('src/ConnectionCheck.php');

$randomUserAgent = new RandomUserAgent();
$urlResponse = new UrlResponse('https://www.csfd.cz/', $randomUserAgent);
$stdNotification = new StdNotification();

$net = new ConnectionCheck($stdNotification, $urlResponse);
$net->check();
