<?php
function connection()
{
    try {
        $conn = new PDO("mysql:dbname=trabalhodupla; host=localhost", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo ('ERROR - ' . $e->getMessage());
    }
    return $conn;
}
