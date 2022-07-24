<?php
 $sql = "CREATE TABLE IF NOT EXISTS $tableName (
       id VARCHAR(300) PRIMARY KEY,
       budget DECIMAL(9,2),
       start_date_project DATE,
       hours_project DECIMAL(5,2)) ENGINE=innoDB";
 $conn->query($sql) or exit($conn->error);