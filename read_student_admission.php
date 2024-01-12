<?php
    include 'db.php';
    //include 'scriptandlinks.php';

    session_start();
    $email = $_SESSION['email'];
    $sql = mysqli_query($con,"SELECT * from users where email='$email'");
    $row = mysqli_fetch_array($sql);
    $role = $row['role'];
    if($_SESSION['loggedin']!="true" || ($_SESSION['loggedin']!=true) || $role!='admission'){
        header("location: index.php");
        exit;
    }
    
?>
<?php
$id = $name = $class= $section = $country = $state = $city  = $image = '';
$id = $_GET['id'];
//include 'db.php';
$sql = "select * from users where id='$id';";
$res = mysqli_query($con, $sql);
$data = mysqli_fetch_array($res);

$name = $data['name'];
$role = $data['role'];
//$class = $data['class'];
//$section = $data['section'];
$country = $data['country'];
$state = $data['state'];
$city = $data['city'];
$role = $data['role'];
$image = isset($data['image']) ? $data['image'] : 'userimage';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Student Admission Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
          <a class="login nav-link text-info" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_user_ad.php">Manage User</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_student_ad.php">Manage Student</a>
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
    <h1 class="mt-3">Details</h1>
    <br><br>
    <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Roll No.</td>
                            <td>Name</td>
                            <td>Class</td>
                            <td>Section</td>
                            <td>Country</td>
                            <td>State</td>
                            <td>City</td>
                            <td>Image</td>
                        </tr>    
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td>101</td>
                            <td><?php echo $name;?></td>
                            <td>1</td>
                            <td>A</td>
                            <td><?php echo $country;?></td>
                            <td><?php echo $state;?></td>
                            <td><?php echo $city;?></td>
                            <td><img src="<?php echo $image?>" width="100" height="100"></td>
                        </tr>
                    </tbody>
                </table>
    </div>
    
</body>
</html>