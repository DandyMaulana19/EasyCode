<?php
// define('DB_HOST', 'localhost'); //alamat server mysql/mariadb
// define('DB_USER', 'root'); //username database
// define('DB_PWD', ''); //password database
// define('DB_NAME', 'easycode'); //nama database (schema)
?>

<?php
class connection
{
    private $host = "localhost";
    private $db_name = "easycode";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            var_dump('Connected');
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
