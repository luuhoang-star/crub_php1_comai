<!-- hiển thị sản phẩm -->
<?php
session_start();
require_once 'db.php';
$sql = "SELECT user FROM acc";
$result = $conn->query($sql);
if (isset($_SESSION['user'])) {
    echo "Chào bạn " . $_SESSION['user'];
} else {
    echo "Không tồn tại cookie nào";          // hiện tên phiên 
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


    <table border="1">
        <tr>
            <td>Id</td>
            <td>Ten</td>
            <td>Anh</td>
            <td>Gia</td>
            <td>Sale</td>
            <td>Chi tiet sp</td>
            <td>Ten Danh muc</td>
            <td>Lua chon</td>
            <a href="insert.php">
                <button>Thêm mới</button>
            </a>
        </tr>

        <?php
        require_once 'db.php';
        $sql = "select * from product inner join category on product.id_cate = category.id_cate order by id_pro desc";
        $allPro = $conn->query($sql);
        ?>

        <?php
        foreach ($allPro as $key => $row) {
        ?>
            <tr>
                <td><?php echo $row['id_pro'] ?></td> <!--$row['id_pro'ư lấy từ csdl và in ra-->
                <td><?php echo $row['name_pro'] ?></td>
                <td><img src="img/<?php echo $row['img_pro'] ?>" alt="anh 123" width="250" height="250"></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['sale'] ?></td>
                <td><?php echo $row['detail'] ?></td>
                <td><?php echo $row['name_cate'] ?></td>
                <td><a href="update.php?id_pro=<?php echo $row['id_pro'] ?>">Sua</a>
                    <a onclick="return confirm('Ban co muon xoa khong ?')" href="delete.php?id_pro=<?php echo $row['id_pro'] ?>">
                        Xoa</a>
                </td>
            </tr>

        <?php } ?>
    </table>
</body>

</html>