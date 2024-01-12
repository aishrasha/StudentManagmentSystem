<?php
    include 'db.php';
    session_start();
    $email = $_SESSION['email'];
    $sql = mysqli_query($con,"SELECT * from users where email='$email'");
    $row = mysqli_fetch_array($sql);
    $role = $row['role'];
    if($_SESSION['loggedin']!="true" || ($_SESSION['loggedin']!=true) || $role!='admin'){
        header("location: index.php");
        exit;
    }
?>

<?php
$id = $name = $class = $section = $country = $state = $city = $image = '';
$id = $_GET['id'];
//include 'db.php';
$sql = "select * from users where id='$id';";
$res = mysqli_query($con, $sql);
$data = mysqli_fetch_array($res);

$name = $data['name'];
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
  <title>Read</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
  <?php
  include 'navbar2.php';
  //require "db.php";
  //echo "welcome user";
  ?>

  <div class="container">
    <h1 class="mt-3">Details</h1>
    <?php
      if($role == 'student'){
    ?>
    <table class="table table-bordered table-stripped">
      <thead>
        <tr>
          <td>ID</td>
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
          <td><?php echo $id; ?></td>
          <td><?php echo $name; ?></td>
          <td>1</td>
          <td>A</td>
          <td><?php echo $country; ?></td>
          <td><?php echo $state; ?></td>
          <td><?php echo $city; ?></td>
          <td><img src="<?php echo $image ?>" style="height:100px; width: 100px;"></td>
        </tr>
      </tbody>
    </table>
    <?php
      }
      else{
    ?>
    <table class="table table-bordered table-stripped">
      <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Country</td>
          <td>State</td>
          <td>City</td>
          <td>Image</td>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $country; ?></td>
          <td><?php echo $state; ?></td>
          <td><?php echo $city; ?></td>
          <td><img src="<?php echo $image ?>" style="height:100px; width: 100px;"></td>
        </tr>
      </tbody>
    </table>
    <?php
      }
    ?>

  </div>




</body>

</html>