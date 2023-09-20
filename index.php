<?php

  require_once('class/template.php');
  require_once('class/notice.php');

  get_header();

  require_once('class/database.php');

  // vyhledáme v databázi všechny uložené pojištěnce a naplníme jimi proměnou $vysledky

  $sql = "SELECT * FROM pojistenci";
  $vysledky = $con->query($sql);

  if ($vysledky->num_rows > 0) {
    // pokud máme alespoň jednu hodnotu vypiseme zahlavi tabulky
    ?>

    <h2>Přehled pojištěnců</h2>

    <form action="edit.php" method="POST" name="edit">
    <table>
     <tr>
       <th>Jméno a příjmení</th>
       <th>Telefon</th>
       <th>Věk</th>
       <th>Upravit/Smazat</th>
     </tr>  

    <?php  
      while($radek = $vysledky->fetch_assoc()) {
      // dokud máme záznam, vypisujeme jednotlivé řádky s konkrétním záznamem    
     ?>  
     <tr>
       <td><?php echo $radek["jmeno"] ." ". $radek["prijmeni"]; ?></td>
       <td><?php echo $radek["telefon"]; ?></td>
       <td><?php echo $radek["vek"]; ?></td>
       <td><a href="edit.php?id=<?php echo $radek['pojistenci_id']; ?>" class="btn-edit">Upravit</a> <a href="delete.php?id=<?php echo $radek['pojistenci_id']; ?>" class="btn-delete">Smazat</a></td>
     </tr>

    <?php    

      }

    // po posledním záznamu uzavřeme tabulku
      echo "</table>";
      echo "</form>";
    

  } else {
      // pokud v tabulce pojištěnci není žádný záznám, upozorníme na to 
      echo "Žádní pojištěnci";
  }

  // uzavřeme spojení s databází

  $con->close();
  ?>

  <h2>Nový pojištěnec</h2> 
   

  <form action="insert.php" method="POST" name="formular" onsubmit="return validateForm()">
    <div class="form-row">
       <div class="form-col">
      <label for="jmeno">Jméno</label> 
      <input type="text" name="jmeno" />
      </div>
      <div class="form-col">
      <label for="prijmeni">Příjmení</label> 
      <input type="text" name="prijmeni" />
      </div>
      </div>     

      <div class="form-row">
      <div class="form-col">    
      <label for="vek">Věk</label> 
      <input type="number" name="vek" />
      </div>
      <div class="form-col">    
      <label for="telefon">Telefon</label> 
      <input type="text" name="telefon" />
      </div>
    </div>       
    
    <div class="form-row"> 
      <input type="submit" name="submit" value="Uložit" />
    </div>   
  </form>

<?php get_footer(); ?>
