/* 
kontrola formulářových polí
*/

function validateForm() {
    let jmeno = document.forms["formular"]["jmeno"].value;
    if (jmeno == "") {
      alert("Jméno musí být vyplněno");
      return false;
    }
    let prijmeni = document.forms["formular"]["prijmeni"].value;
    if (prijmeni == "") {
      alert("Příjmení musí být vyplněno");
      return false;
    }
    let vek = document.forms["formular"]["vek"].value;
    if (vek == "") {
      alert("Věk musí být vyplněn");
      return false;
    }
    let telefon = document.forms["formular"]["telefon"].value;
    if (telefon == "") {
      alert("Telefon musí být vyplněn");
      return false;
    }


}



