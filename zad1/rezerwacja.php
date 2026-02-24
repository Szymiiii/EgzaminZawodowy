<?php
    echo("Dodano rezerwację do bazy");
    $connect = mysqli_connect('localhost', 'root', '', 'baza');
    
    $data = $_POST['data'];
    $osoby = $_POST['osoby'];
    $tel = $_POST['tel'];

    $query = "INSERT INTO `rezerwacje`(`data_rez`, `liczba_osob`, `telefon`) VALUES ('$data', '$osoby', '$tel')";
    
    mysqli_query($connect,$query);

    mysqli_close($connect);
?>