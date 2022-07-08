<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard using HTML</title>
    <!-- MATERIALICONS  -->
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Sharp|Material+Icons+Outlined|Material+Icons+Round"
        rel="stylesheet">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="./equipment.css">
    <link rel="stylesheet" href="./theme.css"> 

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
                <a href="./equipments.php" class="active">
                    <span class="material-icons-sharp">precision_manufacturing</span>
                    <h3>Equipment</h3>
                </a>
                <a href="./theme_new.php">
                    <span class="material-icons-outlined">color_lens</span>
                    <h3>Themes</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">email</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">report</span>
                    <h3>Reports</h3>
                </a>
                <a href="./addeq.html">
                    <span class="material-icons-sharp">add_circle</span>
                    <h3>Add Products</h3>
                </a>
                <a href="./login.html">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log Out</h3>
                </a>

            </div>
        </aside>
        <main>
            <h1>Equipments</h1>

            <p class="greeting">Go have a look at the </p>

            <!-- <div class="insights">
                <div class="equipment">
                    <span class="material-icons-sharp">tv </span>
                    <div class="middle">
                        <div class="left">
                            <h3>Xiaomi TV</h3>
                            <h1 class="success">Online</h1>
                        </div>
                    </div>
                    <small class="text-muted">Now streaming: <b>Harry Potter</b></small>
                    <div>
                        <details class="details"> 
                            <p>Time Added: 2018.7.14</p>
                            <p>ID: 138292011</p>
                            <p>Repair Time: 134days</p>
                        </details>
                    </div>
                </div>
// end of equipment
                <div class="health">
                    <span class="material-icons-outlined">watch</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Watch</h3>
                            <h1 class="danger">Offline</h1>
                        </div>
                    </div>
                    <div>
                        <details class="details"> 
                            <p>Time Added: 2021.9.21</p>
                            <p>ID: 182911</p>
                            <p>Repair Time: 200days</p>
                        </details>
                    </div>
                </div>
// end of health 
                <div class="alert">
                    <a href="./pattern.html">
                        <span class="material-icons-outlined">router</span>
                        <div class="middle">
                            <div class="left">
                                <h3>WIFI Router</h3>
                                <h1 class="success">Online</h1>
                            </div>
                        </div>
                        <small class="text-muted"><b>244kb/s</b> | <b>1.5mb/s</b></small>
                        <div>
                            <details class="details"> 
                                <p>Time Added: 2016.9.3</p>
                                <p>ID: shdifhi29</p>
                                <p style="color: red;">Repair Time: 3days</p>
                            </details>
                        </div>
                    </a>
                </div>
// end of alert
                <div class="happy">
                    <span class="material-icons-sharp">headset</span>
                    <div class="middle">
                        <div class="left">
                            <h3 >Hairset</h3>
                            <h1 style="color: red;">Lost</h1>
                        </div>
                    </div>
                    <small class="text-muted">Last connection: <b>2hrs ago</b></small>
                    <details class="details"> 
                        <p>Time Added: 2022.2.15</p>
                        <p>ID: gdsadhs</p>
                    </details>
                </div>
// end of p4 
                <div class="add">
                    <a href="./addeq.html">
                        <span class="material-icons-sharp">add_circle</span>
                        <div class="middle">
                            <div class="middle">
                            </div>
                        </div>
                    </a>
                </div>

            </div> -->
            
            <div class='insights' style='grid-template-columns: repeat(4, 21rem)'>
            
            <?php
                $FamilyId = 123;

                $mysqli = require __DIR__ . "/database.php";

                $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId)");
                $num    = mysqli_num_rows($result);
                $i = 0;
                for ($i = 0; $i < $num; $i++) {
                    $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId) ORDER BY ID limit $i,1");
                    $row = $result->fetch_assoc();
                    // <form action="equip.php" method="post">
                    echo "
                        <div class='equipment'> 
                            
                            <span class='material-icons-sharp'>tv </span>
                            <div class='middle'>
                                <div class='left'>
                                    <h3>$row[Name]</h3>
                                    <h1 class='success'>$row[Status]</h1>
                                    <h3>Current Pattren: <b>$row[Pattern]</b></h3>
                                    <h3><b>👇DETAILS</b></h3>
                                    <h3>ID: <b>$row[ID]</b></h3>
                                    <h3>Kind: <b>$row[Kind]</b></h3>
                                    <h3>Add data: <b>$row[Date]</b></h3>
                                    <h3>Status: <b>$row[Status]</b></h3>

                                </div>
                            </div>
                            <form action = 'pattern.php' method='POST'>
                            <button name='choose' id='choose' value=$row[ID]>Check pattern</button>
                            </form>
                            <form action = 'deleteEquipment.php' method='POST'>
                            <button name='delete' id='delete' value=$row[ID]>Delete pattern</button>
                            </form>
                        </div>";
                        switch($row["Kind"]){
                            case 'television':
                                $result2 = mysqli_query($mysqli, "SELECT * FROM pattern WHERE (FamilyID = $FamilyId AND ID=$row[ID] AND PatternID=1)");
                                $num2    = mysqli_num_rows($result2);
                                if($num2 == 0) {
                                    $result3 = mysqli_query($mysqli, "SELECT * FROM tv WHERE (FamilyID = $FamilyId AND ID=$row[ID]) limit 0, 1" );
                                    $row3 = $result3->fetch_assoc();
                                    $sql = "INSERT INTO pattern(FamilyID, ID, PatternID, Name)VALUE ('$FamilyId', '$row[ID]', 1, '$row3[Name]')";
                                    mysqli_query($mysqli, $sql) or die (mysqli_error());
                                }
                            break;
                            case 'router':
                                $result2 = mysqli_query($mysqli, "SELECT * FROM pattern WHERE (FamilyID = $FamilyId AND ID=$row[ID] AND PatternID=1)");
                                $num2    = mysqli_num_rows($result2);
                                if($num2 == 0) {
                                    $result3 = mysqli_query($mysqli, "SELECT * FROM router WHERE (FamilyID = $FamilyId AND ID=$row[ID]) limit 0, 1" );
                                    $row3 = $result3->fetch_assoc();
                                    $sql = "INSERT INTO pattern(FamilyID, ID, PatternID, Name)VALUE ('$FamilyId', '$row[ID]', 1, '$row3[Name]')";
                                    mysqli_query($mysqli, $sql) or die (mysqli_error());
                                }
                            break;
                            case 'lamp':
                                $result2 = mysqli_query($mysqli, "SELECT * FROM pattern WHERE (FamilyID = $FamilyId AND ID=$row[ID] AND PatternID=1)");
                                $num2    = mysqli_num_rows($result2);
                                if($num2 == 0) {
                                    $result3 = mysqli_query($mysqli, "SELECT * FROM lamp WHERE (FamilyID = $FamilyId AND ID=$row[ID]) limit 0, 1" );
                                    $row3 = $result3->fetch_assoc();
                                    $sql = "INSERT INTO pattern(FamilyID, ID, PatternID, Name)VALUE ('$FamilyId', '$row[ID]', 1, '$row3[Name]')";
                                    mysqli_query($mysqli, $sql) or die (mysqli_error());
                                }
                            break;
                            case 'curtain':
                                $result2 = mysqli_query($mysqli, "SELECT * FROM pattern WHERE (FamilyID = $FamilyId AND ID=$row[ID] AND PatternID=1)");
                                $num2    = mysqli_num_rows($result2);
                                if($num2 == 0) {
                                    $result3 = mysqli_query($mysqli, "SELECT * FROM curtain WHERE (FamilyID = $FamilyId AND ID=$row[ID]) limit 0, 1" );
                                    $row3 = $result3->fetch_assoc();
                                    $sql = "INSERT INTO pattern(FamilyID, ID, PatternID, Name)VALUE ('$FamilyId', '$row[ID]', 1, '$row3[Name]')";
                                    mysqli_query($mysqli, $sql) or die (mysqli_error());
                                }
                            break;
                            case 'fan':
                                $result2 = mysqli_query($mysqli, "SELECT * FROM pattern WHERE (FamilyID = $FamilyId AND ID=$row[ID] AND PatternID=1)");
                                $num2    = mysqli_num_rows($result2);
                                if($num2 == 0) {
                                    $result3 = mysqli_query($mysqli, "SELECT * FROM fan WHERE (FamilyID = $FamilyId AND ID=$row[ID]) limit 0, 1" );
                                    $row3 = $result3->fetch_assoc();
                                    $sql = "INSERT INTO pattern(FamilyID, ID, PatternID, Name)VALUE ('$FamilyId', '$row[ID]', 1, '$row3[Name]')";
                                    mysqli_query($mysqli, $sql) or die (mysqli_error());
                                }
                            break;
                        }

                }  
            ?>
            
            <div class="add" align="center" >
                    <a href="./addeq.html">
                        <span class="material-icons-sharp">add_circle</span>
                        <div class="middle">
                            <div class="middle">
                            </div>
                        </div>
                    </a>
            </div>
        </div>
        </main>
    </div>
</body>

</html>