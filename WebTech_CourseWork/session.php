  <?php
  session_start();
  if(isset($_SESSION['loggedin'])) header("Location: secret.php");
  ?>
  <!DOCTYPE html>
  <html>
   <head>
     <title>Log-in page</title>
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
      <div class="col-12 center">
        <div class="purpleBackground">
          <br>
          <h2>Welcome To The Student Attendance System</h2>
          <h3>Enter your details to gain access</h3>
        </div>

        <form action="login.php" method="POST">
          <br>
          Login name: <input type="text" name="username">
          <br>
          <br>
          Password: <input type="password" name="password">
          <br>
          <br>
          <input class="button" type="submit">
          <br><br>
        </form>
      </div>
    </div>
    
  </body>
 </html>
