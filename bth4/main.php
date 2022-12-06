<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <h2>DANH SÁCH NHÂN VIÊN</h2>
        <a href='add.php' class='btn btn-primary' style='margin:5px;'><i class='fa fa-plus'></i> Thêm</a>
        
        <table border = "1" style='margin:10px;'>
            <tr>
                <td>STT</td>
                <td>Họ Tên</td>
                <td>Địa chỉ</td>
                <td>Lương</td>
                <td>Thao tác</td>
            </tr>
        <?php
            require_once "config.php";
            $sql = 'select * from nhanvien';
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            ?>
            <?php
                $stt = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<tr>";
                        echo"<td>".$stt++."</td>";
                        echo"<td>".$row["name"]."</td>";
                        echo"<td>".$row["address"]."</td>";
                        echo"<td>".$row["salary"]."</td>";
                        echo"<td><a href='update.php?id=".$row['id']."'><span class='fa fa-pencil'></span></a>
                                <a href='delete.php?id=".$row['id']."'><span class='fa fa-trash'></span></a>";
                    echo "</tr>";
                }
                ?>
               
                <?php
                }
                else {
                    echo "0 results";
                }
                mysqli_close($conn);
            ?>
     </table>
    </body>
</html>