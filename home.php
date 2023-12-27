<!--<p>welcome user</p>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<?php
        //include 'loginNavbar.php';
        require 'db.php';
        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
    <a class="navbar-brand text-info" href="login.php">Student Managment System </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="login nav-link text-info" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage.php">Manage User</a>
        </li>
      </ul>
    </div>
    </div>
    <div class="topnav-right">
    <a  class="text-info" href="#" style="text-decoration: none;"><i class="fa-solid fa-user"></i>Profile</a>&nsbp;
    <a class="text-info" href="#"  style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
  </div>
  </nav>
        <div class="container">
            <h1 class="mt-3 text-center">Users of Student CRUD System.</h1>
          </div> 
          <br><br>
        <div class="container">
            <?php
                $sql = "SELECT * from users ORDER by id ASC;";
                $res = mysqli_query($con,$sql);
                if($res){
                    if(mysqli_num_rows($res)>0){
                        echo '<table class="table table-bordered table-striped">';
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Email</th>";
                                echo "<th>Role</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($res)){
                            echo "<tr>";
						        echo "<td>" . $row['id'] . "</td>";
						        echo "<td>" . $row['email'] . "</td>";
						        //echo "<td>" . $row['role'] . "</td>";
						    echo "<tr>";
                        }
                    echo "</tbody>";                            
                    echo "</table>";
                    mysqli_free_result($res);
                    }
                    else{
                        echo '<div class="alert alert-danger">
                                No Record were Found.
                            </div>';
                    }
                }
                else{
                    echo 'OOPs! something went wrong. please try again later.';
                 }
            mysqli_close($con);
            ?>
        </div>
       
</body>
</html>
<?php
//include 'db.php';
 //echo "<script>alert('welcome user');</script> ";
?>
