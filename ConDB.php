<?php
try {
    $conn = new PDO("sqlsrv:server = tcp:goggy.database.windows.net,1433; Database = goggydb", "gapsurat", "0875727151Gap");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>