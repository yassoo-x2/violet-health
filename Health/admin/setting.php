<?php
$Driver="{ODBC Driver 18 for SQL Server}";
$dbHost = "SQL5107.site4now.net";
$dbName = "db_a8e0be_newhospital";
$dbUser = "db_a8e0be_newhospital_admin";
$dbPass = "$$"."Hospital2013";

try {
    $con = new PDO("sqlsrv:server=$dbHost;Database=$dbName", $dbUser, $dbPass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     "Connected successfully";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'SQLSTATE[28000]') !== false) {
        echo "Error: Invalid username or password." . $e->getMessage();
    } else {
        echo "Error connecting to SQL Server: " . $e->getMessage();
    }
}
if (extension_loaded('sqlsrv')) {
    echo 'sqlsrv is installed.';
} else {
    echo 'sqlsrv is not installed.';
}

  // Check if the table exists
  $tableName = 'login';
  $stmt = $con->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = '$tableName'");
  
  $tableExists = ($stmt->rowCount() < 0);
   $stmt->rowCount();
  if (!$tableExists) {
      // Create the table
      $createTableQuery = "
          CREATE TABLE $tableName (
              id INT PRIMARY KEY IDENTITY(1,1),
              userid VARCHAR(255) NOT NULL UNIQUE,
              username VARCHAR(255) NOT NULL UNIQUE,
              password VARCHAR(255) NOT NULL,
              email VARCHAR(255) NOT NULL,
              phone VARCHAR(20) NOT NULL,
              user_type VARCHAR(20) NOT NULL,
              siteid VARCHAR(20) NOT NULL,
              active VARCHAR(20) NOT NULL,
              Date DATETIME DEFAULT GETDATE()
          )
      ";
  
      $con->exec($createTableQuery);
  } 

  $tableName = 'clinics';

  // Check if the table exists
  $stmt = $con->prepare("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = ?");
  $stmt->execute([$tableName]);

  $tableExists = ($stmt->rowCount() < 0);

  if (!$tableExists) {
      // Create the table
      $createTableQuery = "
          CREATE TABLE $tableName (
              id INT PRIMARY KEY IDENTITY(1,1),
              visit_date DATE NOT NULL,
              hospital NVARCHAR(255) NOT NULL,
              clinic NVARCHAR(255) NOT NULL,
              first_name NVARCHAR(255) NOT NULL,
              father_name NVARCHAR(255) NOT NULL,
              last_name NVARCHAR(255) NOT NULL,
              mother_name NVARCHAR(255) NOT NULL,
              full_name NVARCHAR(255) NOT NULL,
              birthdate DATE NOT NULL,
              gender NVARCHAR(20) NOT NULL,
              document_type NVARCHAR(255) NOT NULL,
              document_num NVARCHAR(255) ,
              residency_status NVARCHAR(20) NOT NULL,
              origin_place NVARCHAR(255) ,
              displacement_period INT ,
              marital_status NVARCHAR(20),
              is_pregnant NVARCHAR(3),
              is_breastfeeding NVARCHAR(3),
              phone_number NVARCHAR(20),
              has_disability NVARCHAR(3),
              DateCreated DATETIME DEFAULT GETDATE()
          )
      ";

      $con->exec($createTableQuery);
  } 





?>