<?php
    // vyplníme hodnoty potřebné pro připojení k databázi
    $host = "localhost";
    $username = "ovesprojekt";
    $password = "Ov3spro7ekt";
    $dbname = "ovesprojekt";

   // vytvoříme spojení s databází
    $con = mysqli_connect($host, $username, $password, $dbname);

    // ujistíme se, zda spojení funguje
    if (!$con)
    {
        die("Spojení selhalo!" . mysqli_connect_error());
    }

?>