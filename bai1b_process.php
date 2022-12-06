<html>
    <head>
        <style>
            table tr td
            {
                padding: 5px;
                
            }
            table
            {
                border-collapse:collapse;
            }
        </style>
    </head>
    <body>
<?php
    if(isset($_POST["ma_sinh_vien"]))
    {
        $maSV = $_POST["ma_sinh_vien"];
        require_once "config.php";
        $sql = "select sv.*, date_format(sv.NgaySinh,'%d/%m/%Y') as ngay_sinh
                     from SinhVien as sv where MaSinhVien ='$maSV'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        ?>
            <table border = "1">
            <tr>
                <td>Mã sinh viên</td>
                <td>Họ</td>
                <td>Tên</td>
                <td>Mã lớp</td>
                <td>Ngày sinh</td>
                <td>Giới tính</td>
            </tr>
            
        <?php
            echo "<tr>";
            echo"<td>".$row["MaSinhVien"]."</td>";
            echo"<td>".$row["Ho"]."</td>";
            echo"<td>".$row["Ten"]."</td>";
            echo"<td>".$row["MaLop"]."</td>";
            echo"<td>".$row["ngay_sinh"]."</td>";
            if($row["GioiTinh"]=="M")
                echo"<td>Nam</td>";
            else
                echo"<td>Nữ</td>";
            echo "</tr>";
        
        // output data of each row
        ?>
        </table>
        <?php
        } 
        else {
            echo "0 results";
        }
        mysqli_close($conn);
    }
    
?>
</body>
</html>