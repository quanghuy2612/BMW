<?php
    class TaiKhoanModel extends DB {
        function getFullName($username, $password) {
            $qr="SELECT * FROM user WHERE username=? AND password=?";
            $stmt = $this->conn->prepare($qr); 
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $row = $result->fetch_assoc(); // fetch data   
            return $row["fullname"];
        }

        function getRole($username, $password) {
            $qr="SELECT role FROM user WHERE username=? AND password=?";
            $stmt = $this->conn->prepare($qr); 
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $row = $result->fetch_assoc(); // fetch data   
            return $row["role"];
        }

        function checkSignUp($username) {
            $qr="SELECT * FROM user WHERE username=?";
            $stmt = $this->conn->prepare($qr); 
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            
            return $result->num_rows;
        }

        function insertUser($username, $password, $fullname) {
            $qr="INSERT INTO user (username, password, fullname, role) VALUES(?, ?, ?, 1)";
            $stmt = $this->conn->prepare($qr);
            $stmt->bind_param("sss", $username, $password, $fullname);
            $stmt->execute();
        }

        function getCurrentUser() {
            $username=$_SESSION["username"];
            $qr="SELECT * FROM user WHERE username='$username'";
            $result=$this->conn->query($qr);
            $row=$result->fetch_assoc();
            return json_encode($row);
        }
        
    }
?>