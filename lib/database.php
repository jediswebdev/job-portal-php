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
        $this->serverName = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbName = $dbName;
    }

    private function connectToDB($useDb = true)
    {
        try {
            $dsn = "mysql:host={$this->serverName}";

            // Only attach dbname if we want to use it AND it isn't empty
            if ($useDb && !empty($this->dbName)) {
                $dsn .= ";dbname={$this->dbName}";
            }

            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::FETCH_DEFAULT, PDO::FETCH_OBJ);

            return $conn;

        } catch (PDOException $e) {
            $error = 'Connection failed: ' . $e->getMessage();
            array_push($this->errors, $error);
            return false;
        }
    }

    public function createDatabase($database_name)
    {
        try {
            // Connect without selecting a DB
            $connection = $this->connectToDB(false);
            if (!$connection)
                return false; // Prevent calling exec() on false

            $sql = "CREATE DATABASE IF NOT EXISTS `$database_name`";
            $connection->exec($sql);

            // Store the database name for future queries
            $this->dbName = $database_name;

            echo 'DB successfully created<br>';

            return [
                'completed' => true,
                'data' => '',
                'message' => 'Database created Successfully!',
                'errors' => $this->errors ?? false
            ];

        } catch (PDOException $e) {
            $error = 'An error occurred while creating database: ' . $e->getMessage();
            array_push($this->errors, $error);
            return false;
        }
    }

    public function createTable($sql_string)
    {
        try {
            $connection = $this->connectToDB();
            if (!$connection)
                return false; // Fixed: Safety check

            $sql = $sql_string;
            $connection->exec($sql);

            echo 'Table Created Successfully<br>';

            return [
                'completed' => true,
                'data' => '',
                'message' => 'Table created Successfully!',
                'errors' => $this->errors ?? false
            ];

        } catch (PDOException $e) {
            $error = 'An error occurred while creating table: ' . $e->getMessage();
            array_push($this->errors, $error);
            return false;
        }
    }

    public function insertToTable($sql_string)
    {
        try {
            $connection = $this->connectToDB();
            if (!$connection)
                return false; // Fixed: Safety check

            $sql = $sql_string;
            $connection->exec($sql);

            echo 'Data inserted Successfully!<br>';

            return [
                'completed' => true,
                'data' => '',
                'message' => 'Data inserted Successfully!',
                'errors' => $this->errors ?? false
            ];
        } catch (PDOException $e) {
            $error = 'An error occurred while inserting data: ' . $e->getMessage();
            array_push($this->errors, $error);
            return false;
        }
    }

    public function insertAndGetID($sql_string)
    {
        try {
            $connection = $this->connectToDB();
            if (!$connection)
                return false; // Fixed: Safety check

            $sql = $sql_string;
            $connection->exec($sql);

            $last_id = $connection->lastInsertId();
            echo 'Data inserted Successfully!<br>';

            return [
                'completed' => true,
                'data' => $last_id,
                'message' => 'Data inserted Successfully!, Id has been also provided',
                'errors' => $this->errors ?? false
            ];
        } catch (PDOException $e) {
            $error = 'An error occurred while inserting data: ' . $e->getMessage();
            array_push($this->errors, $error);
            return false;
        }
    }

    public function getAllDataFromTable($sql_string)
    {
        try {
            $connection = $this->connectToDB();
            if (!$connection)
                return false; // Fixed: Safety check

            $sql = $sql_string;
            $statement = $connection->query($sql);

            // Fixed: Actually fetch the data as an associative array instead of returning the statement object
            $result = $statement->fetchAll(PDO::FETCH_OBJ);

            echo 'Fetched Data Successfully!<br>';

            return [
                'completed' => true,
                'data' => $result,
                'message' => 'Fetched all data successfully!',
                'errors' => $this->errors ?? false
            ];
        } catch (PDOException $e) {
            $error = 'An error occurred while multiple fetching data: ' . $e->getMessage();
            array_push($this->errors, $error);
            return false;
        }
    }

    public function getOneDataFromTable($sql_string){
        try {
            $connection = $this->connectToDB();
            if(!$connection) return false;

            $sql = $sql_string;
            $stmt = $connection->prepare($sql);

            $stmt->execute();

            $response = $stmt->fetch(PDO::FETCH_OBJ);

            return [
                'completed' => true,
                'data' => $response,
                'message' => "Specific data fetched successfully!",
                'errors' => $this->errors ?? false
            ];

        } catch (PDOException $e) {
            $error = 'An error occurred while fetching specific data: ' . $e->getMessage();
            array_push($this->errors, $error);
            return false;
        }
        
    }
}

$db = new Database();

?>
