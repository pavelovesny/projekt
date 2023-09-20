<?php

  require_once('class/template.php');
  require_once('class/notice.php');

  get_header();

  require_once('class/database.php');

  // formulář se odeslal, pokud je v poli POST hodnota
  if (isset($_POST['submit'])) {

      if ( isset($_POST['jmeno']) && isset($_POST['prijmeni']) && isset($_POST['vek']) && isset($_POST['telefon']) ) {
   
          $sql = "INSERT INTO pojistenci (pojistenci_id, jmeno, prijmeni, vek, telefon) VALUES (?, ?, ?, ?, ?)";
          $id = 0;        
          $stmt = mysqli_prepare($con, $sql);
          mysqli_stmt_bind_param($stmt, 'issis', $id, $_POST['jmeno'], $_POST['prijmeni'], $_POST['vek'], $_POST['telefon']);

          // pošleme data do databáze a potvrdíme vložení
          mysqli_stmt_execute($stmt);
          printNotice("byl vložen");
    
          // close connection
          mysqli_close($con);

      } 
  
      else {
          // některá z hodnot formuláře nebyla korektně vyplněna
          echo "Formulář není správně vyplněný!";
      }   
  }

  else {
    echo "Data nebyla odeslána";
  }

get_footer();

?>