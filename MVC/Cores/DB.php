<?php

    class DB {

        public $conn;
        protected $servername = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $dbname = "bmw";

        function __construct(){
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        }

    }

?>