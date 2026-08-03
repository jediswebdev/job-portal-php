<?php
class Database
{
    private $serverName;
    private $username;
    private $password;
    private $dbName;

    public $errors = [];

    public function __construct($dbName = 'job_portal_db')
    {
        $this->serverName = getenv('DB_HOST') ?: 'localhost';
        $this->username = getenv('DB_USERNAME') ?: 'root';
        $this->password = getenv('DB_PASSWORD') ?: '';
        $this->dbName = getenv('DB_NAME') ?: $dbName;
    }

    public function connectToDB($useDb = true)
    {
        try {
            $dsn = "mysql:host={$this->serverName}";

            if ($useDb && !empty($this->dbName)) {
                $dsn .= ";dbname={$this->dbName}";
            }

            $conn = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ]);

            return $conn;

        } catch (PDOException $e) {
            $this->errors[] = 'Connection failed: ' . $e->getMessage();
            return false;
        }
    }

    public function createDatabase($database_name)
    {
        try {
            $connection = $this->connectToDB(false);
            if (!$connection)
                return false;

            $sql = "CREATE DATABASE IF NOT EXISTS `$database_name`";
            $connection->exec($sql);
            $this->dbName = $database_name;

            return [
                'completed' => true,
                'data' => '',
                'message' => 'Database created Successfully!',
                'errors' => $this->errors ?? false
            ];
        } catch (PDOException $e) {
            $this->errors[] = 'An error occurred while creating database: ' . $e->getMessage();
            return false;
        }
    }

    public function createTable($sql_string)
    {
        try {
            $connection = $this->connectToDB();
            if (!$connection)
                return false;

            $connection->exec($sql_string);

            return [
                'completed' => true,
                'data' => '',
                'message' => 'Table created Successfully!',
                'errors' => $this->errors ?? false
            ];
        } catch (PDOException $e) {
            $this->errors[] = 'An error occurred while creating table: ' . $e->getMessage();
            return false;
        }
    }

    // UPDATED: Now accepts a $params array and uses prepare()/execute()
    public function insertToTable($sql_string, $params = [])
    {
        try {
            $connection = $this->connectToDB();
            if (!$connection)
                return false;

            $stmt = $connection->prepare($sql_string);
            $stmt->execute($params);

            return [
                'completed' => true,
                'data' => '',
                'message' => 'Data inserted Successfully!',
                'errors' => $this->errors ?? false
            ];
        } catch (PDOException $e) {
            $this->errors[] = 'An error occurred while inserting data: ' . $e->getMessage();
            return false;
        }
    }

    // UPDATED: Now accepts a $params array
    public function insertAndGetID($sql_string, $params = [])
    {
        try {
            $connection = $this->connectToDB();
            if (!$connection)
                return false;

            $stmt = $connection->prepare($sql_string);
            $stmt->execute($params);
            $last_id = $connection->lastInsertId();

            return [
                'completed' => true,
                'data' => $last_id,
                'message' => 'Data inserted Successfully!, Id has been also provided',
                'errors' => $this->errors ?? false
            ];
        } catch (PDOException $e) {
            $this->errors[] = 'An error occurred while inserting data: ' . $e->getMessage();
            return false;
        }
    }

    // UPDATED: Now accepts a $params array
    public function getAllDataFromTable($sql_string, $params = [])
    {
        try {
            $connection = $this->connectToDB();
            if (!$connection)
                return false;

            $stmt = $connection->prepare($sql_string);
            $stmt->execute($params);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            return [
                'completed' => true,
                'data' => $result,
                'message' => 'Fetched all data successfully!',
                'errors' => $this->errors ?? false
            ];
        } catch (PDOException $e) {
            $this->errors[] = 'An error occurred while multiple fetching data: ' . $e->getMessage();
            return false;
        }
    }

    // UPDATED: Now accepts a $params array
    public function getOneDataFromTable($sql_string, $params = [])
    {
        try {
            $connection = $this->connectToDB();
            if (!$connection)
                return false;

            $stmt = $connection->prepare($sql_string);
            $stmt->execute($params);
            $response = $stmt->fetch(PDO::FETCH_OBJ);

            return [
                'completed' => true,
                'data' => $response,
                'message' => "Specific data fetched successfully!",
                'errors' => $this->errors ?? false
            ];
        } catch (PDOException $e) {
            $this->errors[] = 'An error occurred while fetching specific data: ' . $e->getMessage();
            return false;
        }
    }
}

$db = new Database();
?>