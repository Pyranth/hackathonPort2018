

    <?php

    /* Database credentials. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */

    define('DB_SERVER', '192.168.8.100');

    define('DB_USERNAME', 'monty');

    define('DB_PASSWORD', 'some_pass');

    define('DB_NAME', 'hackathon');

     

    /* Attempt to connect to MySQL database */

    
	$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

     

    // Check connection

    if($mysqli === false){

        die("ERROR: Could not connect.");

    }

    ?>

