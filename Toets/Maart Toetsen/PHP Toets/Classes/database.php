<?php

class DatabaseMysqli {
    private $connection;
    public $error = false;
    public $errormessage = null;
    public $count = null;

    public function __construct($host = null, $username = null, $password = null, $database = null) {
        $this->connect($host, $username, $password, $database);
    }

    protected function connect($host, $username, $password, $database) {
        $config = $this->loadIni();
        if ($host === null && $config) {
            $host = $config['host'];
            $username = $config['username'];
            $password = $config['password'];
            $database = $config['database'];
        }

        $this->connection = mysqli_connect($host, $username, $password, $database);
    }

    private function loadIni() {
        return parse_ini_file("Files/data.ini");
    }

    public function Response($sql) {
        if (!is_string($sql)) {
            $this->error = true;
            $this->errormessage = "SQL request is not a string.";
            return false;
        }

        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            $this->error = true;
            $this->errormessage = "Error: " . mysqli_error($this->connection);
            return false;
        }

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        $this->count = mysqli_num_rows($result);

        return $data;
    }

        public function requestSQL($sql) {
        $result = $this->Response($sql);
        if ($result !== false) {
            print_r($result);
            echo "<br>";
            echo "Count: " . $this->count;
        } else {
            echo "Error: " . $this->errormessage;
        }
    }

    // public function requestSQL($sql) {
    //     $result = $this->Response($sql);
    //     if ($result !== false) {
    //         print_r($result);
    //         $html = "<br>";
    //         $html .= "Count: " . $this->count;
    //     } else {
    //         $html .= "Error: " . $this->errormessage;
    //     }
    //     return $html;
    // }
}
?>
