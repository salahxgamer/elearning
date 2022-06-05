<?php


    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'blog');

    /* Attempt to connect to MySQL database */
    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $mysqli->set_charset("utf8mb4");
        $GLOBALS['conn'] = $mysqli;
    } catch (Exception $e) {
        $GLOBALS['e'] = $e;
        error_log($e->getMessage());
        die("ERROR: Could not connect. " . $e->getMessage());
    }

?>