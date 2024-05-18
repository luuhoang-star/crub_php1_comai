<?php
include_once "db.php"; // b1
if (isset($_GET['id_pro'])) {

    $id_pro = $_GET['id_pro'];  // b1

    $sql_delete = "DELETE FROM product WHERE id_pro= $id_pro";
    $result = $conn->query($sql_delete);  //b2
    
    if ($result) {    //b3
        header("Location:showpro.php");
    } else {
        echo "Khong sua duoc du lieu";
    }
}
