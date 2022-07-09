
<?php
    $FamilyId = 123;
    $ID = $_POST["delete"];

    $con1=mysqli_connect("localhost","root","123456","smarthouse");
    $con2=mysqli_connect("localhost","root","123456","smarthouse");
    $con3=mysqli_connect("localhost","root","123456","smarthouse");

    $result = mysqli_query($con3, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId AND ID = $ID) limit 0, 1");
    $row = $result->fetch_assoc();
    switch($row["Kind"]) {
        case 'television':
            $sql1 = "DELETE FROM tv WHERE (FamilyID = $FamilyId AND ID = $ID)";
            mysqli_query($con1, $sql1) or die (mysqli_error());
            break;
        case 'router':
            $sql1 = "DELETE FROM router WHERE (FamilyID = $FamilyId AND ID = $ID)";
            mysqli_query($con1, $sql1) or die (mysqli_error());
            break;
        case 'lamp':
            $sql1 = "DELETE FROM lamp WHERE (FamilyID = $FamilyId AND ID = $ID)";
            mysqli_query($con1, $sql1) or die (mysqli_error());
            break;
        case 'curtain':
            $sql1 = "DELETE FROM curtain WHERE (FamilyID = $FamilyId AND ID = $ID)";
            mysqli_query($con1, $sql1) or die (mysqli_error());
            break;
        case 'fan':
            $sql1 = "DELETE FROM fan WHERE (FamilyID = $FamilyId AND ID = $ID)";
            mysqli_query($con1, $sql1) or die (mysqli_error());
            break;
    }
    $sql2 = "DELETE FROM pattern WHERE (FamilyID = $FamilyId AND ID = $ID)";
    $sql3 = "DELETE FROM equipment WHERE (FamilyID = $FamilyId AND ID = $ID)";
    mysqli_query($con2, $sql2) or die (mysqli_error());
    mysqli_query($con3, $sql3) or die (mysqli_error());

    header("Location: equipments.php");

?>