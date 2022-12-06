<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="bai_th3.php" style='margin-left:200px;'>
                <img src='tmdb.svg' width='154' height='20' />
            </a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="bai_th3.php?cat=Now Playing">Now Playing</a>
                    <a class="nav-link active" href="bai_th3.php?cat=Popular">Popular</a>
                    <a class="nav-link active" href="bai_th3.php?cat=Top Rated">Top Rated</a>
                    <a class="nav-link active" href="bai_th3.php?cat=Upcoming">Upcoming</a>
                </div>
            </div>
        </div>
    </nav>
    <center>
        <div>

            <?php
            $sql = "select * from movie";
            if (isset($_GET["cat"])) {

                $cat = $_GET["cat"];
                if ($cat != "")
                    $sql = "SELECT * FROM movie WHERE category like '%$cat%'";
            } else
                $cat = "";

            if (isset($_GET["page"])) {
                $page = $_GET["page"];
                $sql .= "limit " . (($page - 1) * 10) . ",10";
            } else {
                $sql .= " limit 10";
            }
            require_once "config.php";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
            ?>
                <table>
                    <?php
                    $dem = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($dem == 0)
                            echo "<tr>";
                    ?>
                        <td align='center'>
                            <img src="image/<?php echo $row["image"]; ?>" width='250px' /><br />
                            <b><?php echo $row["movie_name"]; ?></b><br />
                            <i><?php echo $row["release_date"]; ?></i>
                        </td>
                    <?php
                        $dem++;
                        if ($dem == 5) {
                            echo "</tr>";
                            $dem = 0;
                        }
                    }
                    ?>
                </table>
            <?php
            } else {
                echo "0 results";
            }
            mysqli_close($conn);


            ?>

        </div>
        <a href="bai_th3.php?cat=<?php echo $cat; ?>&page=1">1</a>
        <a href="bai_th3.php?cat=<?php echo $cat; ?>&page=2">2</a>
        <a href="bai_th3.php?cat=<?php echo $cat; ?>&page=3">3</a>
    </center>



</body>

</html>