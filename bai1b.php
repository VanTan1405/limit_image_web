<?php
    if(isset($_POST['ma_sinh_vien'])){

        $MaSinhVien = $_POST["ma_sinh_vien"];
        require_once "config.php";
        // $sql ='SELECT sv.MaSinhVien, sv.Ten, sv.MaLop
        // FROM sinhvien AS sv';
        $sql = "SELECT sv.MaSinhVien, sv.Ten, sv.MaLop
        FROM sinhvien AS sv
        WHERE sv.MaSinhVien = '$MaSinhVien'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_assoc($result);
            ?>
            <table border="1">
                <tr class="file">
                    <tr class="file">
                    <td>Ma SV</td>
                    <td>Ten SV</td>
                    <td>Ma Lop</td>
                </tr>
                </tr>
    <?php
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo"<td>" . $row["MaSinhVien"] . "</td>";
                    echo"<td>" . $row["Ten"] . "</td>";
                    echo"<td>" . $row["MaLop"] . "</td>";
                    echo"</tr>";
                }
            ?>
            </table>
            <?php
            }
                else 
                    {
                        echo "0 results";
                    }
                    mysqli_close($conn);
                }            
    ?>
    
