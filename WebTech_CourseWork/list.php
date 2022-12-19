<?php session_start();
 if(!isset($_SESSION['loggedin'])) header("Location: session.php");
 if($_SESSION['loggedin']===FALSE) header("Location: session.php");


 $file = "attendance.csv";
 $fp = fopen($file, "r");
 $arr = [];
 $username = '';
 $admin = 'false'; //initialises admin variable to false

 switch($_SESSION['admin']) {  // if user logged in is admin
    // Administrator view
    case 1:
        $admin = 'true'; // sets admin to True
        while (($data = fgetcsv($fp)) !== FALSE) { // open csv file
            $arr[] = $data; // creates array using csv file
        }
        break;
    
    // Student view
    case 0: 
        $username = $_SESSION['username']; // sets username to the session user
        while (($data = fgetcsv($fp)) !== FALSE) { // open csv
            if(str_replace(' ', '', $data[1]) == $_SESSION['username']){
                $arr[] = $data;
            }
        }
        break;
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
                <h2>Welcome to the list of student attendance
                <?php echo ucfirst($_SESSION['username']) ?></h2>
            </div>  

            <br>
            <div id="">
                <table id="attendance">
                    <thead>
                        <tr>
                            <th style="display: none;"></th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Module Code</th>
                            <th>Date</th>
                            <?php if ($_SESSION['admin'] == 1) { ?>
                                <th>View</th>
                            <?php } ?>
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
                                <?php if ($_SESSION['admin'] == 1) { ?>
                                    <td>
                                        <a href="display.php?username=<?php echo str_replace(' ', '', $data[1]) ?>">View</a>
                                    </td>
                                <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <button class="button" id="loadDoc" name="loadDoc" >Reload Page</button>
        </div>    
    </div>

    <form action="Back.php" method="POST">
        <input class="button" type="submit" value="Return">
    </form>
    <p>&copy; 2021 Private Message Limited</p>
    
</body>

<script>
    var username = '<?php echo $username ?>'; // sets username to session username
    var admin = '<?php echo $admin ?>'; // sets variable for admin access (True or False)
    $(document).ready(function() {
        $('#loadDoc').click(function() {
            $.ajax({
                url:"attendance.csv",
                dataType: "text",
                success: function(data) {
                    var student_data = data.split(/\r?\n|\r/); // Regex to split the csv into lines
                    student_data.forEach(ele => {
                        if(ele == ''){
                            return false;
                        }
                        var csvArr = ele.split(',');
                    
                        // stops duplicate data from being displayed in view attendance table
                        var found = 0;
                        $('td:first-child').each(function() { // Loop through the first column of every row in the table
                            if (csvArr[0] == $(this).text()) { // If the csv unique ID value is equal to the row ID in table
                                found++;
                            }
                        });
                        if (found == 0) { // if the ID's do not match then
                            if((username != '' && (csvArr[1]).trim() == username) || admin == 'true'){ 
                                if(admin == 'true'){ // data shown to admin
                                    $('#attendance tbody').append('<tr><td style="display: none;">'
                                    +csvArr[0]+'</td><td>'+csvArr[1]+'</td><td>'+csvArr[2]+' '+csvArr[3]
                                    +'</td><td>'+csvArr[4]+'</td><td>'+csvArr[5]+'</td><td><a href="/display.php?username='
                                    +(csvArr[1]).trim()+'">View</a></td></tr>');
                                } else { // data shown to student
                                    $('#attendance tbody').append('<tr><td style="display: none;">'+csvArr[0]
                                    +'</td><td>'+csvArr[1]+'</td><td>'+csvArr[2]+' '+csvArr[3]+'</td><td>'
                                    +csvArr[4]+'</td><td>'+csvArr[5]+'</td></tr>');
                                }
                            }
                        }
                    });
                }
            });
        });
    });

</script>
</html>