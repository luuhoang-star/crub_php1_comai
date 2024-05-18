<!-- them san pham -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Thêm sản phẩm</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>Tên sản phẩm</p><input type="text" name="name">
        <p>Anh</p><input type="file" name="img_pro">                <!-- b1 -->
        <p>Gia</p><input type="text" name="price">
        <p>Gía khuyến mãi </p><input type="text" name="sale">
        <p>Chi tiết sản phẩm </p><input type="text" name="detail">
        <p>Danh mục sp </p>
        <select name="cate" id="">
            <option value="1">Bi</option>
            <option value="2">Sua</option>
            <option value="3">Do choi</option>
        </select>
        <input type="submit" value="Them san pham" name="btn_insert">
    </form>
    <?php
    include_once 'db.php';
    if (isset($_POST['btn_insert'])) {
        $name = $_POST['name'];  // tên name trong input,$_POST lưu,gán dữ liệu vào $name,
        $price = $_POST['price'];
        $sale = $_POST['sale'];                        // b2
        $detail = $_POST['detail'];
        $id_cate = $_POST['cate'];

        $img_name = $_FILES['img_pro']['name'];
        $tmp = $_FILES['img_pro']['tmp_name'];
        move_uploaded_file($tmp, 'img/' . $img_name);

        $sql_insert = "INSERT INTO product VALUES (null, '$name', '$img_name', $price, $sale, '$detail', $id_cate)";
        $result = $conn->query($sql_insert);            //b3
        if ($result) { // chèn hết vào csdl thì xuất vô trang showpro

            header("Location: showpro.php");
            exit(); // Dừng thực thi mã sau khi chuyển hướng
        } else {
            echo "Không thêm được dữ liệu";
        }
    }
    ?>

</html>
</body>