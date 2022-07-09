<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard using HTML</title>
    <!-- MATERIALICONS  -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Sharp|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./images/sharp_holiday_village_black_24dp.png">
                    <h2>IH<span class="danger">AC</span></h2>

                </div>
                <div class="close">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="./index.php">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./equipments.php">
                    <span class="material-icons-sharp">precision_manufacturing</span>
                    <h3>Equipment</h3>
                </a>
                <a href="./theme_new.php">
                    <span class="material-icons-outlined">color_lens</span>
                    <h3>Themes</h3>
                </a>
                <a href="./message.php">
                    <span class="material-icons-sharp">email</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="./report.php">
                    <span class="material-icons-sharp">report</span>
                    <h3>Reports</h3>
                </a>
                <a href="./addeq.html">
                    <span class="material-icons-sharp">add_circle</span>
                    <h3>Add Products</h3>
                </a>
                <a href="./logout.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log Out</h3>
                </a>

            </div>
        </aside>
        <main>
            <h1>Dashboard</h1>
            <div class="insights">
                <div class="equipment">
                    <span class="material-icons-sharp">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <a href="./equipments.php">
                                <h3>Total Number of Equipments</h3>
                                <?PHP

                                session_start();
                                $FamilyId = 123;
                                $mysqli = require __DIR__ . "/database.php";
                                $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId)");
                                $num    = mysqli_num_rows($result);
                                echo "<h1>$num</h1>";
                                ?>
                            </a>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- end of equipment -->
                <div class="health">
                    <span class="material-icons-sharp">health_and_safety</span>
                    <div class="middle">
                        <div class="left">
                            <h3>health_and_safety</h3>
                            <?PHP
                            $mysqli = require __DIR__ . "/database.php";
                            $result = mysqli_query($mysqli, "SELECT * FROM reports");
                            $nume    = mysqli_num_rows($result);
                            if ($nume) {
                                echo "<h1 style='color:red'>Please check</h1>";
                            } else {

                                echo "<h1>ALL good</h1>";
                            }
                            ?>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- end of health -->
                <div class="alert">
                    <span class="material-icons-sharp">notifications</span>
                    <div class="middle">
                        <a href="./report.php">
                            <h3>Alert</h3>
                            <?PHP
                            $mysqli = require __DIR__ . "/database.php";
                            // $result = mysqli_query($mysqli, "SELECT * FROM reports");
                            // $nume    = mysqli_num_rows($result);
                            echo "<h1>$nume</h1>";
                            ?>
                        </a>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- end of alert  -->
            </div>
            <!-- end of insights -->
            <div class="details">
                <h2>Equipments Details</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Equip. Name</th>
                            <th>Kind</th>
                            <th>Pattern</th>
                            <th>Battery</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?PHP
                    ini_set("display_errors", 0);
                    $FamilyId = 123;

                    $mysqli = require __DIR__ . "/database.php";

                    $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId)");
                    $num    = mysqli_num_rows($result);
                    $i = 0;
                    for ($i = 0; $i < $num; $i++) {
                        $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId) limit $i,1");
                        $row = $result->fetch_assoc();
                        $bat = "";
                        if ($row["Battery"] == 0)
                            $bat = $row["Charging"];
                        else
                            $bat = strval($row["Electric"]);

                        echo "
                    <tbody>
                        <tr>
                            <td>$row[Name]</td> 
                            <td>$row[Kind]</td>
                            <td>$row[Pattern]</td>
                            <td class='success'>$bat</td>
                            <td class='success'>$row[Status]</td>
                        </tr>
                    </tbody>
                    ";
                    }


                    // <table>
                    //     <thead>
                    //         <tr>
                    //             <th>Equip. Name</th>
                    //             <th>Location</th>
                    //             <th>Battery</th>
                    //             <th>Status</th>
                    //             <th></th>
                    //         </tr>
                    //     </thead>
                    //     <tbody>
                    //         <tr>
                    //                 <td>Air conditioner</td> 
                    //                 <td>Living room</td>
                    //                 <td class="success">Charging</td>
                    //                 <td class="success">Good</td>
                    //         </tr>
                    //     </tbody>
                    //     <tbody>
                    //         <tr>
                    //                 <td>Air conditioner</td> 
                    //                 <td>Living room</td>
                    //                 <td class="success">Charging</td>
                    //                 <td class="success">Good</td>
                    //         </tr>
                    //     </tbody>
                    //     <tbody>
                    //         <tr>
                    //                 <td>Air conditioner</td> 
                    //                 <td>Living room</td>
                    //                 <td class="success">Charging</td>
                    //                 <td class="success">Good</td>
                    //         </tr>
                    //     </tbody>
                    //     <tbody>
                    //         <tr>
                    //                 <td>Air conditioner</td> 
                    //                 <td>Living room</td>
                    //                 <td class="success">Charging</td>
                    //                 <td class="success">Good</td>
                    //         </tr>
                    //     </tbody>

                    // </table>
                    ?>
                </table>
                <a href="#">show all</a>

            </div>
        </main>
        <div class="right">
            <div class="top">
                <div class="profile">
                    <div class="info">
                        <?php

                        $mysqli = require __DIR__ . "/database.php";
                        $stmt = $mysqli->stmt_init();

                        $result = mysqli_query($mysqli, "SELECT name FROM usr WHERE id = $_SESSION[user_id]");
                        $row = $result->fetch_assoc();
                        
                        echo "
                            <p>Hey, <b>$row[name]</b></p>
                        ";
                        ?>
                        <!-- <p>Hey, <b>David</b></p> -->
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./images/profile-2.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="recent-updates">
                <h2>Recent-Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-3.jpg" alt="">
                        </div>
                        <div class="message">
                            <?php
                            $mysqli = require __DIR__ . "/database.php";
                            $sql = "INSERT INTO message (name, message, time)
                            VALUES (?,?,?)";
                            $stmt = $mysqli->stmt_init();

                            if (!$stmt->prepare($sql)) {
                                die("SQL error: " . $mysqli->error);
                            }
                            $result = mysqli_query($mysqli, "SELECT * FROM message ORDER BY time DESC limit 1");
                            $row = $result->fetch_assoc();
                            echo "<div class = 'updates'><b>$row[name]<br><div style='font-weight:lighter'>$row[message]<br><font color='purple'>$row[time]</font><br></div></b></div>";
                            echo "<br>"

                            ?>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-4.jpg" alt="">
                        </div>
                        <div class="message">
                            <?php
                            $mysqli = require __DIR__ . "/database.php";
                            $sql = "INSERT INTO message (name, message, time)
                            VALUES (?,?,?)";
                            $stmt = $mysqli->stmt_init();

                            if (!$stmt->prepare($sql)) {
                                die("SQL error: " . $mysqli->error);
                            }

                            $result = mysqli_query($mysqli, "SELECT * FROM message ORDER BY time DESC limit 1,1");

                            $row = $result->fetch_assoc();
                            echo "<div class = 'updates'><b>$row[name]<br><div style='font-weight:lighter'>$row[message]<br><font color='purple'>$row[time]</font><br></div></b></div>";
                            echo "<br>"
                            ?>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-1.jpg" alt="">
                        </div>
                        <div class="message">
                            <?php
                            $mysqli = require __DIR__ . "/database.php";
                            $sql = "INSERT INTO message (name, message, time)
                            VALUES (?,?,?)";
                            $stmt = $mysqli->stmt_init();

                            if (!$stmt->prepare($sql)) {
                                die("SQL error: " . $mysqli->error);
                            }

                            $result = mysqli_query($mysqli, "SELECT * FROM message ORDER BY time DESC limit 2,1 ");
                            $row = $result->fetch_assoc();
                            echo "<div class = 'updates'><b>$row[name]<br><div style='font-weight:lighter'>$row[message]<br><font color='purple'>$row[time]</font><br></div></b></div>";
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>