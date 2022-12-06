<!DOCTYPE html>
<?php
    if(isset($_POST["ho_ten"]))
    {
        //xử lý cập nhật dữ liệu vào database
        $hoTen = $_POST["ho_ten"];
        $diaChi = $_POST["dia_chi"];
        $luong = $_POST["luong"];
        $id = $_POST["id"];
        require_once "config.php";
        $sql = "update nhanvien set name = '$hoTen', address ='$diaChi', salary ='$luong' where id = '$id'";
        if (mysqli_query($conn, $sql) > 0) {
            echo "Cập nhật dữ liệu thành công"."<br/>";
            echo "<a href='main.php'>Về trang chính</a>";
        }
        else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    else
    {
?>
<html>
    <head></head>
    <body>
        <?php 
            $id = $_GET["id"];
            require_once "config.php";
            $sql = "select * from nhanvien where id = '$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            mysqli_close($conn);
        ?>
        <h2>Cập nhật nhân viên</h2>
        <form action = "update.php" method = "post">
            Họ tên:<br/>
            <input type ="text" value="<?php echo $row['name'];?>" name = "ho_ten"/><br/>
            Địa chỉ:<br/>
            <textarea name = "dia_chi"><?php echo $row['address'];?></textarea><br/>
            Lương:<br/>
            <input type = "text" value = "<?php echo $row['salary'];?>" name = "luong"/><br/><br/>
            <input type = "hidden" name="id" value="<?php echo $id;?>"/>
            <input type ="submit" name = "submit" value = "Lưu"/>
            <a href="main.php">Thoát</a>
        </form>
    </body>
</html>
<?php
    }
?>