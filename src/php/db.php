<?php

class Db
{
    private $server;
    private $name;
    private $password;
    private $dbname;
    private $charset;

    protected function connect() {
        $this->server="localhost";
        $this->name="root";
        $this->password="";
        $this->dbname="panda_csv";
        $this->charset="utf8mb4";

        try {
            $param_pdo = "mysql:host=".$this->server.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($param_pdo, $this->name, $this->password);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        }
        catch (PDOException $e) {
            //echo "Connection failed: ".$e->getMessage();
            echo "Wystąpił problem z połączeniem z bazą #1DB";
        }
    }
}

?>
