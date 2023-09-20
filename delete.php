<?php

  require_once('class/template.php');
  require_once('class/notice.php');

  get_header();

  if (is_numeric($_GET['id'])) {

      require_once('class/database.php');

      // formulář se odeslal, pokud je v poli POST hodnota
      if ( isset($_GET['id'])) {

          // smažeme uživatele, pokud existuje korektní id
          $sql = "DELETE FROM pojistenci WHERE  pojistenci_id = ?";
          $stmt = mysqli_prepare($con, $sql);
          mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);

          // pošleme data do databáze a potvrdíme vložení
          mysqli_stmt_execute($stmt);

          printNotice("byl smazán");

          // close connection
          mysqli_close($con);

      } 

      else {
          // některá z hodnot formuláře nebyla korektně vyplněna
          echo "Formulář není správně vyplněný!";
      } 


  } else {
    echo "Nebezpečná hodnota";
  }

get_footer();

?>