<?php

    $serverName = "localhost";
    $connectionOptions = array("Database"=>"college",
        "Uid"=>"sa", "PWD"=>"YourPassword123");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false){
        die(FormatErrors(sqlsrv_errors()));
         echo 'connect error';
    }
?>


