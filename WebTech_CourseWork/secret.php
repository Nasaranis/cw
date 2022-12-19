<?php session_start();
 if(!isset($_SESSION['loggedin'])) header("Location: session.php");
 if($_SESSION['loggedin']===FALSE) header("Location: session.php");
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Secret Area</title>
        <link rel="stylesheet" href="websiteStyleSheet.css"> <!-- link for style sheet used -->
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
                <h2>Welcome to the Secret Message area
                <?php echo ucfirst($_SESSION['username']) ?></h2>
            </div>

            <br>
            <?php
            // PHP code here displays messages based on authorisation

            switch($_SESSION['admin']) {
                // Administrator view
                case 1:
                    echo '<a class="button" href= "admin.php">Create New User</a> 
                        <a class="button" href= "list.php">View Student Attendance</a><br><br>';
                        break;
                // Student view
                case 0: 
                    echo '<a class="button" href= "submit.php">Record Attendance</a>
                        <a class="button" href= "list.php">View Attendance</a><br><br>';
                        break;
            }
            ?>   
        </div>    
    </div>

    <form action="logout.php" method="POST">
        <input class="button" type="submit" name="logout" value="Log out">
    </form>
    
    <p>&copy; 2021 Private Message Limited</p>
    
 </body>
 </html>
