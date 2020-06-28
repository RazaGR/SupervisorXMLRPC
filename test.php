<?php
require_once("vendor/autoload.php");
$api = new \Supervisor\Api('127.0.0.1', 9001 /* username, password */);

// Call Supervisor API
echo  $api->getApiVersion()."\n";
echo $api->twiddlerGetAPIVersion()."\n";
print_r($api->twiddlerGetGroupNames());
echo "\Add program\n";
$api->twiddlerAddProgramToGroup('razalabs','razatest',['command' => 'ls -la && sleep 2','autostart' => 'false','autorestart' => 'false','startsecs' => '0']);
print_r($api->twiddlerGetGroupNames());
echo "\nRemove\n";
$api->twiddlerRemoveProcessFromGroup('razalabs','razatest');
echo "\nAfter remove\n";
print_r($api->twiddlerGetGroupNames());



