<?php
    $successalert = false;
    include 'db.php';
   
    session_start();
    $email = $_SESSION['email'];
    $sql = mysqli_query($con,"SELECT * from users where email='$email'");
    $row = mysqli_fetch_array($sql);
    $role = $row['role'];
    if($_SESSION['loggedin']!="true" || ($_SESSION['loggedin']!=true) || $role!='admin'){
        header("location: login.php");
        exit;
    }


if ($_SERVER['REQUEST_METHOD']=="POST"){
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $name = $_POST['name'];
    $sql = "UPDATE classes SET $subject='$name' WHERE class='$class'";
    $res = mysqli_query($con,$sql);
    $successalert = true;
            
    mysqli_close($con);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign</title>
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
          <a class="login nav-link text-info" href="admission.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_admission.php">Manage Admission</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_teacher.php">Manage Teacher</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_user_ad.php">Manage User</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_student.php">Manage Student</a>
        </li>
        <!-- <li class="nav-item">
          <a class="register nav-link text-info" href="#">Manage Student</a>
        </li> -->
      </ul>
    </div>
    </div>
    <div class="topnav-right">
    <a  class="text-info" href="profile.php" style="text-decoration: none;"><i class="fa-solid fa-user"></i>Profile</a>&nsbp;
    <a class="text-info" href="logout.php"  style="text-decoration: none;"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
  </div>
  </nav>
  <br><br>
<div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" id="createform">
                <div class="form-group">
                    <p>Please fill this form and submit to assign class and subject.</p>
                    <label for="class">Class</label>
                    <input type="number" name="class" id="class" class="form-control mt-2" value="<?php echo $class;?>">
                </div>
                <div class="form-group">
                    <label for="name" class="mt-2">Teacher</label>
                    <select type="text" name="name" id="name" class="form-control mt-2" value="<?php echo $name?>">
                    <option value="">Select Teacher</option>
                    <?php
                    require_once 'db.php';
                    $result = mysqli_query($con,"SELECT * from users WHERE role='teacher'");
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject" class="mt-2">Subject</label>
                    <select name="subject" id="subject" class="form-control mt-2" value="<?php echo $subject;?>" required>
                        <option value="physics">Physics</option>
                        <option value="chemistry">Chemistry</option>
                        <option value="math">Math</option>
                        <option value="science">Science</option>
                        <option value="english">English</option>
                        <option value="hindi">Hindi</option>
                    </select>
                </div>
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary" id="btnadd">Submit</button>
                    <a href="manage_teacher.php" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </form>
        </div> 
    
</body>
</html>