<?php 
// Change database name before upload
function dbConnection() {

$dbHost = "";
$dbPort = "";
$dbUser = "";
$dbPassword = "";

$dbName = "housing";

$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

if ($openShiftVar === null || $openShiftVar == "")
{
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = 'root';
$dbName = 'housing';
}
else 
{ 
// In the openshift environment
//echo "Using openshift credentials: ";

$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
} 
    
try {
$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $ex) {
echo 'Sorry the connection is not working properly right now';
}

if (is_object($db)) {
return $db;
} else {
return FALSE;
}   
}