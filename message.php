<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dashboard using HTML</title>
    <!-- MATERIALICONS  -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Sharp|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">
    <!-- STYLESHEET -->

    <link rel="stylesheet" href="./theme.css">
    <link rel="stylesheet" href="./style.css">
    <script src="./theme.js"></script>
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
                <a href="./equipments.html">
                    <span class="material-icons-sharp">precision_manufacturing</span>
                    <h3>Equipment</h3>
                </a>
                <a href="./theme_new.php">
                    <span class="material-icons-outlined">color_lens</span>
                    <h3>Themes</h3>
                </a>
                <a href="./message.html">
                    <span class="material-icons-sharp">email</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">report</span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
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
            <h1>Messages</h1>
            <p class="greeting" style="color: gray; font-size: 20px;">Please submit your own opinion </p>
            <!--<div class="themepallete">
                <div class="theme">
                    <label for="theme" class="text-muted">What do you wang to say</label>
                    <div>
                        <input id="message" class="messageinput" required maxlength="200" style="font-size:20px;">
                    </div>
                </div>
            </div>

            <div class="themepallete" id="hello">
                <p class="themetext" id="themeletter"></p>
            </div>-->
            <form action="mess.php" method="post">

                <div class="themepallete">
                    <div class=="theme">
                        <label for="theme" class="text-muted">What's your name</label>
                        <div>
                            <input type="usr_id" id="usr_id" name="usr_id">
                        </div>
                    </div>
                    <div class=="theme">
                        <label for="theme" class="text-muted">What do you wang to say</label>
                        <div>
                            <input type="mess" id="mess" name="mess">
                        </div>
                    </div>
                    <button>send</button>
                </div>
                <div class="themepallete">
                        <?php
                        $mysqli = require __DIR__ . "/database.php";
                        $sql = "INSERT INTO message (name, message, time)
                        VALUES (?,?,?)";
                        $stmt = $mysqli->stmt_init();

                        if (!$stmt->prepare($sql)) {
                            die("SQL error: " . $mysqli->error);
                        }


                        $result = mysqli_query($mysqli, "SELECT * FROM message ORDER BY time DESC");
                        $num    = mysqli_num_rows($result);
                        $i = 0;
                        
                        
                        
                        for ($i = 0; $i < $num; $i++) {
                            $result = mysqli_query($mysqli, "SELECT * FROM message ORDER BY time DESC limit $i,1");
                            $row = $result->fetch_assoc();
                            echo "<div class = 'themepallete'><b>$row[name]<br><div style='font-weight:lighter'>$row[message]</div><font color='purple'>$row[time]</font><br></b></div>";
                            
                        }
                        
                        ?>
                </div>

            </form>

        </main>
    </div>
</body>

</html>

<script>
    document.onkeydown = function(e) {
        if ((e || event).keyCode == 13) {

            var message = document.getElementById("message").value;
            themeletter.classList.add("message");
            var board = document.querySelector("#hello")
            var themes = document.createElement("div");
            themes.classList.add("themepallete");
            themes.innerText = message;
            themes.appendChild(themeletter);
            board.appendChild(themes);
            console.log(message);
        }
    }
</script>