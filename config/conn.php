<?php
 $host = "127.0.0.1";
 $user = "root";
 $password = "";
 $dbName = "mydb";
 $tableName = "projetos";

 $conn = new mysqli($host, $user, $password) or exit($conn->error);
 $conn->set_charset("utf8");