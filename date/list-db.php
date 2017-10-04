<?php
include "connect-db.php";

$sql = "SELECT * FROM quiztable";
$result = $conn->query($sql);  // cer rezultatele facand query din $sql pe conn(xiune). Stochez in result.

$quiz = array();                // creez un json in care voi pune datele

if ($result->num_rows > 0) {                    // daca sunt inregistrari, atunci se face while
    while ($row = $result->fetch_assoc()) {     // citeste rezultatele si face la fel pentru toate rezultatele
        $quiz[] = array(                        // adauga obiect in array. Obiectul(json) de mai jos.
            "id" => $row["id"],                 // valori copiate in array-ul $quiz din rand din baza de date
            "question" => $row["question"],     // valori copiate in array-ul $quiz din rand din baza de date
            "answers" => json_decode($row["answers"]),       // valori copiate in array-ul $quiz din rand din baza de date
        );
    }
}
$conn->close();

echo json_encode($quiz, true);
?>