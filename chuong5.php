<html>
    <head>

    </head>
    <body>
        <a href='chuong5.php?cat=Now Playing'>Now Playing</a>
        <a href='chuong5.php?cat=Popular'>Popular</a>
        <a href='chuong5.php?cat=Top Rated'>Top Rated</a>
        <a href='chuong5.php?cat=Upcoming'>Upcoming</a><br/>
        <?php
            $cat = "Now Playing";
            if(isset($_GET["cat"]))
                $cat = $_GET["cat"];
        ?>
        <?php
            $page = 1;
            if(isset($_GET["page"]))
            {
                $page = $_GET["page"];
            }
                
            
            require_once "config_movie.php";
            $sql = "SELECT * FROM `movie` WHERE category like '%$cat%' limit ".(($page-1)*10).",10";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            ?>
            <table>
            <?php
                $dem = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    if($dem==0)
                        echo "<tr>";
                ?>
                        <td align='center'>
                            <img src="image/<?php echo $row["image"];?>" width='250px'/><br/>
                            <b><?php echo $row["movie_name"];?></b><br/>
                            <i><?php echo $row["release_date"];?></i>
                        </td>
                    <?php
                    $dem++;
                    if($dem==5)
                    {
                        echo "</tr>";
                        $dem=0;
                    }
                }
                ?>
                </table>
                <?php
            }
            else {
                    echo "0 results";
                }
            
            $sql2 = "SELECT count(*) as sl FROM `movie` WHERE category like '%$cat%'";
            $numPage = 0;
            $result = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $numPage = ceil($row["sl"]/10);
            }
            mysqli_close($conn);

            
        ?>
        <?php 
            for ($i = 1; $i<=$numPage;$i++)
            {
        ?>
             <a href='chuong5.php?cat=<?php echo $cat;?>&page=<?php echo $i;?>'><?php echo $i;?></a>
        <?php        
            }
        ?>
       
    </body>
</html>