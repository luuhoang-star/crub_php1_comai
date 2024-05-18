<!--dung id de sua,nen ko dc sua id cua csdl-->
<?php
include_once 'db.php';
if (isset($_GET['id_pro'])) {
    $id_pro = $_GET['id_pro'];
    $sql_one = "select * from product"; // muốn tạo form phải truy vấn csdl  
    $one_pro = $conn->query($sql_one)->fetch();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Cap nhat sản phẩm</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_pro" value="<?php echo $one_pro['id_pro'] ?>">             <!-- b1 -->
        <p>Tên sản phẩm</p><input type="text" name="name" value="<?php echo $one_pro['name_pro'] ?>" >
        <p>Anh</p>
        <input type="file" name="img_pro"> 
        <img src="img/<?php echo $one_pro['img_pro'] ?>" width="200px">
        <p>Gia</p><input type="text" name="price" value="<?php echo $one_pro['price'] ?>" >
        <p>Gía khuyến mãi </p><input type="text" name="sale" value="<?php echo $one_pro['sale'] ?>" >
        <p>Chi tiết sản phẩm </p><input type="text" name="detail" value="<?php echo $one_pro['detail'] ?>" >
        <p>Danh mục sp </p>
        <select name="cate" id="">
            <option value="1">Bim</option>
            <option value="2">Sua</option>
            <option value="3">Do choi</option>
        </select>
        <input type="submit" value="cap nhat san pham" name="btn_update">
    </form>
    <?php
    if (isset($_POST['btn_update'])) {
        $id_pro = $_POST['id_pro'];
        $name = $_POST['name'];  // tên name trong input     // b2 
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $detail = $_POST['detail'];
        $id_cate = $_POST['cate'];

        $img_name = $_FILES['img_pro']['name'];
        $tmp = $_FILES['img_pro']['tmp_name'];
        move_uploaded_file($tmp, 'img/' . $img_name);
        
        $sql_update = "update product set name_pro='$name',img_pro='$img_name',price='$price',sale='$sale',detail='$detail'
        where id_pro='$id_pro'";
        $result = $conn->query($sql_update);       // b3 xong        
        if ($result) {                    // // b4
            header("Location:showpro.php");        
        } else {
            echo "Không sua đc dữ liệu";
        }
    }
    ?>
</body>

</html>