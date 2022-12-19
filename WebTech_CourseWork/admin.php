<?php session_start();
 if($_SESSION['loggedin']===FALSE) header("Location: session.php");
 ?>

 <!DOCTYPE html>
<html>
    <head>
        <title>Admin Area</title>
        <link rel="stylesheet" href="websiteStyleSheet.css"> <!-- link for style sheet used -->
    </head>

<body>

    <div class="row">
        <!-- navBar -->
        <div id="banner">
            <div class="navbar">
                <h1 class="textColor">ADMINISTRATOR SETTINGS</h1>
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
                <h2>Welcome to the Admin Area
                <?php echo ucfirst($_SESSION['username']) ?>
                </h2>
                <h2>Create User</h2>
            </div>

            <form action="adduser.php" method="POST">
                <br><br>
                <select name="authorisation" required>
                    <option>Choose Account Type</option>
                    <option value="1">Teacher</option>
                    <option value="0">Student</option>
                </select><br><br>
                <label>Username:</label> 
                <input type="text"  name="username" required><br><br>
                <label>Password:</label>
                <input type="password"  name="password" required><br><br>
                
                <input class="button" type="submit">
            </form>

        </div>    
    </div>

    <form action="Back.php" method="POST">
        <input class="button" type="submit" value="Return">
    </form>
    <p>&copy; 2021 Private Message Limited</p>

</body>