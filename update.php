<?php

require_once('class/template.php');
require_once('class/notice.php');

get_header();

require_once('class/database.php');

if (is_numeric($_POST['id'])) {

    // formulář se odeslal, pokud je v poli POST hodnota
    if (isset($_POST['submit'])) { 

        if ( isset($_POST['jmeno']) && isset($_POST['prijmeni']) && isset($_POST['vek']) && isset($_POST['telefon']) ) {

            // data z formuláře vložíme do databázového dotazu, který jej uloží do tabulky
            $sql = "UPDATE pojistenci SET jmeno =  ?, prijmeni =  ?, vek =  ?, telefon =  ? WHERE  pojistenci_id = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, 'ssisi', $_POST['jmeno'], $_POST['prijmeni'], $_POST['vek'], $_POST['telefon'], $_POST['id']);
          
            // pošleme data do databáze a potvrdíme vložení
            mysqli_stmt_execute($stmt);

            printNotice("upraven");
                
            // close connection
            mysqli_close($con);

            // některá z hodnot formuláře nebyla korektně vyplněna

            } 
          
            else {
                echo "Formulář není správně vyplněný!";
            }

    }

    else {
        echo "Data nebyla odeslána";
    }

}   else {
    
    echo "Nebezpečná hodnota";
}

get_footer();

?>