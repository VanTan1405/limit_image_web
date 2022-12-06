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
    require_once "config.php";
    $sql = "select sv.MaSinhVien, Ho, Ten, MaLop, HocKy, NamHoc, count(*) soluongmonhoc from dangkymonhoc as dk, sinhvien as sv,
    namhochocky nh
        where dk.MaSinhVien = sv.MaSinhVien
        and dk.DotHoc = nh.DotHoc
        and dk.DotHoc = '2021-09-06'
        group by sv.MaSinhVien, Ho, Ten, MaLop, HocKy, NamHoc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
?>
    <table border = "1">
        <tr>
            <td>Mã sinh viên</td>
            <td>Họ</td>
            <td>Tên</td>
            <td>Mã lớp</td>
            <td>Học kỳ</td>
            <td>Năm học</td>
            <td>Số lượng môn học</td>
        </tr>
<?php
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
            echo"<td>".$row["MaSinhVien"]."</td>";
            echo"<td>".$row["Ho"]."</td>";
            echo"<td>".$row["Ten"]."</td>";
            echo"<td>".$row["MaLop"]."</td>";
            echo"<td>".$row["HocKy"]."</td>";
            echo"<td>".$row["NamHoc"]."</td>";
            echo"<td>".$row["soluongmonhoc"]."</td>";
        echo "</tr>";
    }
    ?>
    </table>
    <?php
    }
    
    else {
        echo "0 results";
    }
    mysqli_close($conn);
?>
</body>
</html>