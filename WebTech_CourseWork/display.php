<?php

session_start();
if(!isset($_SESSION['loggedin'])) header("Location: session.php");
if($_SESSION['loggedin']===FALSE) header("Location: session.php");

if ((!isset($_GET['username']))){ 
    header("Location: list.php");
}

$file = "attendance.csv";
$fp = fopen($file, "r");
$arr = [];
while (($data = fgetcsv($fp)) !== FALSE) {
    if(str_replace(' ', '', $data[1]) == $_GET['username']){
        $arr[] = $data;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Secret Area</title>
        <link rel="stylesheet" href="websiteStyleSheet.css"> <!-- link for style sheet used -->
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>

<body>
    <div class="row">
        <!-- navBar -->
        <div id="banner">
            <div class="navbar">
                <h1 class="textColor">ATTENDANCE SYSTEM</h1>
                <ul>
                <li><a href="homePage.html">Home</a></li>
                <li><a href="CVPage.html">Curriculum Vitae</a></li>
                <li><a href="weatherPage.html">Weather App</a></li>
                <li><a href="http://www.teach.scam.keele.ac.uk/prin/x3f17/WebTech_CourseWork/session.php">Attendance System</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row contentBorder">
        <div class="center">
            <div class="purpleBackground">
                <br>
                <h2>Welcome to the the display area for each student
                <?php echo ucfirst($_SESSION['username']) ?></h2>
            </div>  

            <table id="attendance">
                <thead>
                    <tr>
                        <th style="display: none;"></th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Module Code</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($arr as $data) { ?>
                        <tr >
                            <td style="display: none"><?php echo $data[0]; ?></td>
                            <td><?php echo $data[1]; ?></td>
                            <td><?php echo $data[2] . ' ' . $data[3]; ?></td>
                            <td><?php echo $data[4]; ?></td>
                            <td><?php echo $data[5]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>    
    </div>

    <form action="Back.php" method="POST">
        <input class="button" type="submit" value="Return">
    </form>
    <p>&copy; 2021 Private Message Limited</p>
    
</body>