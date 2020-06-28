<?php
require_once("vendor/autoload.php");
$api = new \Supervisor\Api('127.0.0.1', 9001 /* username, password */);

// Call Supervisor API
echo  $api->getApiVersion()."\n";
echo $api->twiddlerGetAPIVersion()."\n";

echo "\Add program\n";
$command = ['command' => 'ls -l','autostart' => 'false','autorestart' => 'false','startsecs' => '0'];
$api->twiddlerAddProgramToGroup('razalabs','razatest',$command);

print_r($api->startProcess('razalabs:razatest'));
echo "\nSTART LOG\n";
print_r($api->getProcessInfo('razalabs:razatest'));

print_r($api->stopProcess('razalabs:razatest'));
echo "\nSTOP LOG\n";
print_r($api->getProcessInfo('razalabs:razatest'));


echo "\nPROGRAM LOG\n";
print_r($api->readProcessLog('razalabs:razatest', 0, 50));

echo "\nRemove\n";
$api->twiddlerRemoveProcessFromGroup('razalabs','razatest');
echo "\nAfter remove\n";
print_r($api->twiddlerGetGroupNames());



