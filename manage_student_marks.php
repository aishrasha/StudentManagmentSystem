<?php
    include 'db.php';

    session_start();
    $email = $_SESSION['email'];
    $sql = mysqli_query($con,"SELECT * from users where email='$email'");
    $row = mysqli_fetch_array($sql);
    $role = $row['role'];
    if($_SESSION['loggedin']!="true" || ($_SESSION['loggedin']!=true) || $role!='teacher'){
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Student Marks Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">   
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
    <a class="navbar-brand text-info" href="login.php">Student Managment System </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="login nav-link text-info" href="teacher.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_student_marks.php">Manage Student Marks</a>
        </li>
      </ul>
    </div>
    </div>
    <div class="topnav-right">
    <a  class="text-info" href="profile.php" style="text-decoration: none;"><i class="fa-solid fa-user"></i>Profile</a>&nsbp;
    <a class="text-info" href="logout.php"  style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
  </div>
  </nav>
  <div class="container">
            <h1 class="mt-3 text-center">Update Students Mark.</h1>
        </div>
        <br><br>
        <div class="container">
            <?php
            $sql = "select class from classes where (physics='t1' or math='t1' or science='t1' or hindi='t1' or english='t1' or chemistry='t1')";
            $res = mysqli_query($con,$sql);
            $arr = array();
            while($row = mysqli_fetch_array($res)){
                array_push($arr,$row['class']);
            }
            $sql = "SELECT * from users where role='student' ORDER BY class ASC";
            $res = mysqli_query($con,$sql);
            
            if(mysqli_num_rows($res)>0){
                echo '<table class="table table-bordered table-striped">';
				echo "<thead>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Email</th>";
                echo "<th>Role</th>";
                echo "<th>Class</th>";
                echo "</tr>";
				echo "</thead>";
			    echo "<tbody>";
                while($row = mysqli_fetch_array($res)){
                    if(in_array($row["class"],$arr)){
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>" . $row['class'] . "</td>";
                        echo "<td>";	
                        echo '<a href="updatemarks.php?id='. $row['id'] .'" class="mr-3 btn btn-secondary" title="Update Details" data-toggle="tooltip">Update marks</a></td>';
                        echo "</tr>";
                    }
				}
			    echo "</tbody>";                            
                echo "</table>";
                mysqli_free_result($res);
            }
            
            
            ?>
    </div>
       
</body>
</html>