require_once("vendor/autoload.php");
$api = new \Supervisor\Api('127.0.0.1', 9001 /* username, password */);

// Call Supervisor API
echo  $api->getApiVersion()."\n";
echo $api->twiddlerGetAPIVersion()."\n";
//$api->twiddlerRemoveProcessFromGroup('razalabs','razatest');
echo "\Add program\n";
$command = ['command' => 'ls -la /var/www','autostart' => 'false','autorestart' => 'false','startsecs' => '0'];
$api->twiddlerAddProgramToGroup('razalabs','razatest',$command);

print_r($api->startProcess('razalabs:razatest'));
echo "\nSTART LOG\n";
print_r($api->getProcessInfo('razalabs:razatest'));
sleep(2);
#print_r($api->stopProcess('razalabs:razatest'));
#echo "\nSTOP LOG\n";
print_r($api->getProcessInfo('razalabs:razatest'));


echo "\nPROGRAM LOG\n";
print_r($api->readProcessLog('razalabs:razatest', 0, 5000));

echo "\nRemove\n";
$api->twiddlerRemoveProcessFromGroup('razalabs','razatest');
echo "\nAfter remove\n";
print_r($api->twiddlerGetGroupNames());
