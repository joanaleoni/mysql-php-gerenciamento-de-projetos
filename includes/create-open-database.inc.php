<?php
 $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
 $conn->query($sql) or exit($conn->error);
 $conn->select_db($dbName);