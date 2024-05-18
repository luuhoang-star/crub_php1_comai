<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=demophp1;charset=utf8","root","");
    }
    catch (\Throwable $th){
        //throw $th;
        echo "loi ket noi";
    
    }
?>

