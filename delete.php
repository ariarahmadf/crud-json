<?php
    // Memanggil data json
    $file = "data.json";
    $user = file_get_contents($file);
    $dataUser = json_decode($user, true);
    $deleteData = $_GET['name'];

    foreach($dataUser as $index => $d) {
        if($d['name'] == $deleteData){
            array_splice($dataUser, $index, 1);
        }
    }

    $jsonFile = json_encode($dataUser, JSON_PRETTY_PRINT);
    $user = file_put_contents($file, $jsonFile);
    header('location: user.php');
?>