<?php

  require_once('class/template.php');
  require_once('class/notice.php');

  get_header();

  if (is_numeric($_GET['id'])) {

    require_once('class/database.php');

    $sql = "SELECT * FROM pojistenci WHERE  pojistenci_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);
    mysqli_stmt_execute($stmt);
    $vysledky = $stmt->get_result(); 

    if ($vysledky) {
        // pokud existuje pojištěnec
    
        while($osoba = $vysledky->fetch_assoc()) {
  
        ?>
        <h2>Editace pojištěnce</h2> 
         
        
         <form action="update.php" method="POST" name="formular" onsubmit="return validateForm()">
           <div class="form-row">
              <div class="form-col">
             <label for="jmeno">Jméno</label> 
             <input type="text" name="jmeno" value="<?php echo $osoba["jmeno"]; ?>" />
             </div>
             <div class="form-col">
             <label for="prijmeni">Příjmení</label> 
             <input type="text" name="prijmeni" value="<?php echo $osoba["prijmeni"]; ?>" />
             </div>
             </div>     
         
             <div class="form-row">
             <div class="form-col">    
             <label for="vek">Věk</label> 
             <input type="number" name="vek" value="<?php echo $osoba["vek"]; ?>" />
             </div>
             <div class="form-col">    
             <label for="telefon">Telefon</label> 
             <input type="text" name="telefon" value="<?php echo $osoba["telefon"]; ?>" />
             </div>
           </div>       
           
           <div class="form-row">
             <input type="hidden" name="id" value="<?php echo $osoba["pojistenci_id"]; ?>" /> 
             <input type="submit" name="submit" value="Uložit" />
           </div>   
         </form>
 
         <?php 
 
         } 


    } else {
    echo "Daný pojištěnec neexistuje";
    } 

} else {
    echo "Nebezpečná hodnota";
}

get_footer();

?>

