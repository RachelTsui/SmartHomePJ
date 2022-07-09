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
            <h1>Pattern</h1>
            
                <p class="greeting">Go have a look at the pattern</p>
            <form action = "choosePattern.php" method="POST">
            <div class="insights" style="grid-template-columns: repeat(4, 21rem)">
            <?PHP
                $FamilyId = 123;
                session_start();
                if(!empty($_POST)){
                    $ID = $_POST["choose"];
                    $_SESSION["ID"]=$ID;
                } 
                else
                    $ID=$_SESSION["ID"];
                //echo $ID;
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $mysqli = require __DIR__ . "/database.php";

                $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId AND ID = $ID) limit 0, 1");
                $row = $result->fetch_assoc();
                $eqname=$row["Name"];
                    
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
                            <h3>$eqname</h3>
                            <h2>$row[Name]<br></h2>
                            <h3>PatternID:<b>$row[PatternID]</b><br></h3>
                            <h3>WIFI:<b>$row[WIFI]</b><br></h3>
                            <h3>Accerelator:<b>$row[Accelerator]</b><br></h3>  
                            <h3>Light:<b>$row[Light]</b><br></h3>
                        </div>
                    </div>
                    <button name='choose' id='choose' value='$row[Name]'>Choose this</button>
                </div>";}
                    break;
                    case "television":
                        $result = mysqli_query($mysqli, "SELECT * FROM tv WHERE (FamilyID = $FamilyId AND ID = $ID)");
                        $num    = mysqli_num_rows($result);
                        $i = 0;
                        for ($i = 0; $i < $num; $i++) {
                        $result = mysqli_query($mysqli, "SELECT * FROM tv WHERE (FamilyID = $FamilyId AND ID = $ID) ORDER BY PatternID limit $i,1");
                        $row = $result->fetch_assoc();
                        
                echo "
                <div class = 'euqipments'>
                <span class='material-icons-outlined'>tv</span>
                    <div class='middle'>
                        <div class='left'>
                        <h3>$eqname</h3>
                            <h2>$row[Name]<br></h2>
                            <h3>PatternID:<b>$row[PatternID]</b><br></h3>
                            <h3>Power:<b>$row[Power]</b><br></h3>
                            
                        </div>
                    </div>
                    <button name='choose' id='choose' value='$row[Name]'>Choose this</button>
                </div>";}
                    break;
                    case "lamp":
                        $result = mysqli_query($mysqli, "SELECT * FROM lamp WHERE (FamilyID = $FamilyId AND ID = $ID)");
                        $num    = mysqli_num_rows($result);
                        $i = 0;
                        for ($i = 0; $i < $num; $i++) {
                        $result = mysqli_query($mysqli, "SELECT * FROM lamp WHERE (FamilyID = $FamilyId AND ID = $ID) ORDER BY PatternID limit $i,1");
                        $row = $result->fetch_assoc();
                        
                echo "
                <div class = 'euqipments'>
                <span class='material-icons-outlined'>tv</span>
                    <div class='middle'>
                        <div class='left'>
                        <h3>$eqname</h3>
                            <h2>$row[Name]<br></h2>
                            <h3>PatternID:<b>$row[PatternID]</b><br></h3>
                            <h3>Normal:<b>$row[Normal]</b><br></h3>
                            <h3>Bright:<b>$row[Bright]</b><br></h3>  
                            <h3>Dark:<b>$row[Dark]</b><br></h3>
                        </div>
                    </div>
                    <button name='choose' id='choose' value='$row[Name]'>Choose this</button>
                </div>";}
                    break;
                    case "curtain":
                        $result = mysqli_query($mysqli, "SELECT * FROM curtain WHERE (FamilyID = $FamilyId AND ID = $ID)");
                        $num    = mysqli_num_rows($result);
                        $i = 0;
                        for ($i = 0; $i < $num; $i++) {
                        $result = mysqli_query($mysqli, "SELECT * FROM curtain WHERE (FamilyID = $FamilyId AND ID = $ID) ORDER BY PatternID limit $i,1");
                        $row = $result->fetch_assoc();
                        
                echo "
                <div class = 'euqipments'>
                <span class='material-icons-outlined'>tv</span>
                    <div class='middle'>
                        <div class='left'>
                        <h3>$eqname</h3>
                            <h2>$row[Name]<br></h2>
                            <h3>PatternID:<b>$row[PatternID]</b><br></h3>
                            <h3>Thin:<b>$row[Thin]</b><br></h3>
                            <h3>Thick:<b>$row[Thick]</b><br></h3>  
                            
                        </div>
                    </div>
                    <button name='choose' id='choose' value='$row[Name]'>Choose this</button>
                </div>";}
                    break;
                    case "fan":
                        $result = mysqli_query($mysqli, "SELECT * FROM fan WHERE (FamilyID = $FamilyId AND ID = $ID)");
                        $num    = mysqli_num_rows($result);
                        $i = 0;
                        for ($i = 0; $i < $num; $i++) {
                        $result = mysqli_query($mysqli, "SELECT * FROM fan WHERE (FamilyID = $FamilyId AND ID = $ID) ORDER BY PatternID limit $i,1");
                        $row = $result->fetch_assoc();
                        
                echo "
                <div class = 'euqipments'>
                <span class='material-icons-outlined'>tv</span>
                    <div class='middle'>
                        <div class='left'>
                        <h3>$eqname</h3>
                            <h2>$row[Name]<br></h2>
                            <h3>PatternID:<b>$row[PatternID]</b><br></h3>
                            <h3>rotate:<b>$row[Rotate]</b><br></h3>
                            <h3>powerful:<b>$row[Powerful]</b><br></h3>  
                            <h3>normal:<b>$row[Normal]</b><br></h3>
                            <h3>weak:<b>$row[Weak]</b><br></h3>
                        </div>
                    </div>
                    <button name='choose' id='choose' value='$row[Name]'>Choose this</button>
                </div>";}
                    break;
                }
                echo "
                <div class='add'>
                    <a href='./addpatternH.php'>
                        <span class='material-icons-sharp'>add_circle</span>
                        <div class='middle'>
                            <div class='middle'>
                            </div>
                        </div>
                    </a>
                </div>"

//                <button name='choose' id='choose' value='$ID'>Choose pattern</button>
            ?>
                <!-- <div class="add">
                    <a href="./addpatternH.php">
                        <span class="material-icons-sharp">add_circle</span>
                        <div class="middle">
                            <div class="middle">
                            </div>
                        </div>
                    </a>
                </div> -->
            </div>

            </div>
            
        </main>
    </div>


</body></html>