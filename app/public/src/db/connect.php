<?

require_once("credentials.php");

try {
   $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USERNAME, DB_PASSWORD);
} catch (Exception $e) {
   echo $e;
}
