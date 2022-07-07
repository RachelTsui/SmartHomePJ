<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard using HTML</title> 
    <!-- MATERIALICONS  -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Sharp|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">
    <!-- STYLESHEET -->  
    <link rel="stylesheet" href="./pattern.css">

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
                <a href="./indexH.php">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="./equipments.php" class="active">
                    <span class="material-icons-sharp">precision_manufacturing</span>
                    <h3>Equipment</h3>
                </a>
                <a href="./theme.html">
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
            <h1>Pattern</h1>
            
                <p class="greeting">Go have a look at the </p>
            
            <div class="insights">
            <?PHP
                $FamilyId = 123;
                $ID = 1;
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli = require __DIR__ . "/database.php";

                $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId AND ID = $ID) limit 0, 1");
                $row = $result->fetch_assoc();
                    
                switch($row["Kind"]) {
                    case "router":
                        $result = mysqli_query($mysqli, "SELECT * FROM router WHERE (FamilyID = $FamilyId AND ID = $ID)");
                        $num    = mysqli_num_rows($result);
                        $i = 0;
                        for ($i = 0; $i < $num; $i++) {
                        $result = mysqli_query($mysqli, "SELECT * FROM router WHERE (FamilyID = $FamilyId AND ID = $ID) ORDER BY PatternID limit $i,1");
                        $row = $result->fetch_assoc();
                        
                echo "
                <div class = 'euqipments'>
                <span class='material-icons-outlined'>tv</span>
                    <div class='middle'>
                        <div class='left'>
                            <h2>$row[Name]<br></h2>
                            <h3>WIFI:<b>$row[WIFI]</b><br></h3>
                            <h3>Accerelator:<b>$row[Accelerator]</b><br></h3>  
                            <h3>Light:<b>$row[Light]</b><br></h3>
                        </div>
                    </div>
                </div>";}
                    break;
                }
            ?>
                <div class="add">
                    <a href="./addpatternH.php">
                        <span class="material-icons-sharp">add_circle</span>
                        <div class="middle">
                            <div class="middle">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            </div>
        </main>
    </div>


</body></html>