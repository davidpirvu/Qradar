<?php
include "connect-db.php";
// declar variabile in afara functiei pentru ca le folosesc in ambele situatii ale functiei
$first_name = $_GET["firstName"];
$last_name = $_GET["lastName"];
$phone = $_GET["phone"];

// SQL modify
if(isset($_GET["id"]) && $_GET["id"] != '') {     // Daca 1. id este dat si ($$=true pentru ambele) 2. inclusiv  id obilgatoriu diferit(!=) de valoarea nimic ('')
    //sql to update person
    $id = $_GET["id"];       // cer un ID. Citim id-ul si vedem daca e id-ul nostru.
    $sql = "UPDATE agenda SET first_name='$first_name', last_name='$last_name', phone='$phone' WHERE id=$id";  // construiesc SQL
} else {
    // sql to add person
    $sql = "INSERT INTO agenda (first_name, last_name, phone) VALUES ('$first_name', '$last_name', '$phone')";  // construiesc SQL\
}
$conn->query($sql);     // fac solicitare pe SQL creat . Doar pentru valoarea adevarata a functiei
$conn->close();         // inchid conexiunea

header('Location: ../contacte.html');
?>
