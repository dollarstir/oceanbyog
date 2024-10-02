
<?php
class Database
{
private static $instance = null;
private $connection; // Define the connection property here

private function __construct()
{
$dsn = "mysql:host=" . Config::get('DB_HOST') . ";dbname=" . Config::get('DB_NAME');
$username = Config::get('DB_USER');
$password = Config::get('DB_PASSWORD');
$this->connection = new PDO($dsn, $username, $password);
$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

public static function getInstance()
{
if (self::$instance === null) {
self::$instance = new Database();
}
return self::$instance;
}

public function getConnection()
{
return $this->connection;
}

public function query($sql, $params = [])
{
$stmt = $this->connection->prepare($sql);
$stmt->execute($params);
return $stmt;
}
}
