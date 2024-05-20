<?php 
    if (!isset($_POST['date'])) {
        header('location: restauracja.html');
    }else{
        $con = new mysqli('localhost', 'root', '', 'filcel-egzamin-01');
        $sql = "INSERT INTO rezerwacje (id, nr_stolika, data_rez, liczba_osob, telefon) VALUES (NULL, '', " . $_POST['date'] . ", " . $_POST['guests'] . ", '" . $_POST['phone'] . "')";
        $con->query($sql);
        echo 'Wpisano rezerwację do bazy';
        mysqli_close($con);
    }
?>