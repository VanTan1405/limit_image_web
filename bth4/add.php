<!DOCTYPE html>
<?php
    if(isset($_POST["ho_ten"]))
    {
        //xử lý cập nhật dữ liệu vào database
        $hoTen = $_POST["ho_ten"];
        $diaChi = $_POST["dia_chi"];
        $luong = $_POST["luong"];
        require_once "config.php";
        $sql = "INSERT INTO nhanvien (name, address, salary)
        values('".$hoTen."', '$diaChi', '$luong')";
        if (mysqli_query($conn, $sql) > 0) {
            echo "Thêm dữ liệu thành công"."<br/>";
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
        <h2>Thêm nhân viên</h2>
        <form action = "add.php" method = "post">
            Họ tên:<br/>
            <input type ="text" value="" name = "ho_ten"/><br/>
            Địa chỉ:<br/>
            <textarea name = "dia_chi"></textarea><br/>
            Lương:<br/>
            <input type = "text" value = "" name = "luong"/><br/><br/>
            <input type ="submit" name = "submit" value = "Lưu"/>
            <a href="main.php">Thoát</a>
        </form>
    </body>
</html>
<?php
    }
?>