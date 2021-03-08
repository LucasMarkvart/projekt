
<?php

	/*define("dbserver", "127.0.0.1");
    define("dbuser", "root");
    define("dbpass", "");
    define("dbname", "projekt");
    
    $db = new PDO(
            "mysql:host=" .dbserver. ";dbname=" .dbname,dbuser,dbpass,
            array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"
            )
          );
    global $db;*/
    function db() {
        $server = "127.0.0.1";
        $name = "projekt";
        $user = "root";
        $pass = "";
        //$port = "3306";

        $charset = "utf8";
        $dsn = "mysql:host=$server;dbname=$name;charset=$charset";

        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        try {
            return new PDO($dsn, $user, $pass, $opt);
        } catch (PDOException $exception) {
            echo "Připojení selhalo: " . $exception->getMessage();
            exit;
        }
    }

    
?>