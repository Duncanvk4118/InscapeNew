<?php

class Database 
{
    public 
    $host,
    $dbLabel,
    $pass,
    $user;

    public function __constructor($host, $dbLabel, $pass, $user)
    {
        $this->host = $host;
        $this->dbLabel = $dbLabel;
        $this->pass = $pass;
        $this->user = $user;
    }

    public function connect()
    {
        $servername = $this->host;
        $username = $this->user;
        $password = $this->pass;

        $conn = mysqli_connect($servername, $username, $password);
    }

    public function Query()
    {
        $sql = mysqli_query("SELECT * FROM Top2000");
    }

    public function loadData()
    {
        ;
    }
}