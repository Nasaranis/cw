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
                <h2>Welcome to the Attendance Log Area for
                <?php echo $_SESSION['username'] ?>. </h2>
            </div>

            <br> 
            <form action="saveAttendance.php" method="POST">
                Forename: <input type="text" pattern="[A-Za-z]{1,20}" name="fName"  required><br><br>
                Surname: <input type="text" pattern="[A-Za-z]{1,20}" name="sName" required><br><br>
                Module ID: <input type="text" name="mCode" required><br><br>
                Date: <input type="date" name="attendDate" required><br><br>
                <input class="button" type="submit">
            </form>
        </div>    
    </div>

    <form action="Back.php" method="POST">
        <input class="button" type="submit" value="Return">
    </form> 
    <p>&copy; 2021 Private Message Limited</p>
    
 </body>
 </html>
