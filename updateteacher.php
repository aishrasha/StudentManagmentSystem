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
?>
<?php
$rowerror = false;
$sucessalert = false;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
include 'db.php';


if ($_SERVER['REQUEST_METHOD']=="POST"){
    $id = $_POST['id'];
    $countryID = $_POST['country'];
    $stateID = $_POST['state'];
    $cityID = $_POST['city'];

    $result = mysqli_query($con,"select name from countries where id='$countryID'");
    $row = mysqli_fetch_array($result);
    $countryname = $row['name'];

    $sresult = mysqli_query($con,"select state from states where s_id='$stateID'");
    $row1 = mysqli_fetch_array($sresult);
    $statename = $row1['state'];

    $cresult = mysqli_query($con,"select city from cities where c_id='$cityID'");
    $row2 = mysqli_fetch_array($cresult);
    $cityname = $row2['city'];



    $name = $_POST['name'];
    $sql1 = "update users set name='$name',country='$countryname', state='$statename',city='$cityname' where id='$id'";
    $result = mysqli_query($con,$sql1);
    $sucessalert = true;
            
    mysqli_close($con);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jqajax.js"></script>
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
          <a class="login nav-link text-info" href="admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_user_ad.php">Manage User</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_admission.php">Manage Admission</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_teacher.php">Manage Teacher</a>
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
            <h1 class="mt-5">Update Record</h1>



            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" id="createform">
                <div class="form-group">
                    <p>Please fill this form and submit to update admission record to the database.</p>
                    <input type="hidden" name="id" id="id" class="form-control mt-2" value="<?php echo $id;?>">
                </div>
                <div class="form-group">
                    <label for="name1" class="mt-2">Name</label>
                    <input type="text" name="name" id="name" class="form-control mt-2" required>
                </div>
                <div class="form-group">
                    <label for="country" class="mt-2">Country</label>
                    <select type="text" name="country" id="country" class="form-control mt-2" value="<?php echo $countryID?>">
                    <option value="">Select Country</option>
                    <?php
                    require_once 'db.php';
                    $result = mysqli_query($con,"SELECT * from countries");
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="state" class="mt-2">State</label>
                    <select type="text" name="state" id="state" class="form-control mt-2" value="<?php echo $stateID; ?>"></select>
                </div>
                <div class="form-group">
                    <label for="city" class="mt-2">city</label>
                    <select type="text" name="city" id="city" class="form-control mt-2" value="<?php echo $cityID; ?>"></select>
                </div>
                
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary" id="btnadd">Submit</button>
                    <a href="manage_admission.php" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script>

            $(document).ready(function() {
            $('#country').on('change', function() {
            var country_id = this.value;
            $.ajax({
                url: "states-by-country.php",
                type: "POST",
                data: {
                    country_id: country_id
                },
                cache: false,
                success: function(result){
                    $("#state").html(result);
                    $('#city').html('<option value="">Select State First</option>'); 
                }
            });
            });    
            $('#state').on('change', function() {
            var state_id = this.value;
            $.ajax({
                url: "cities-by-state.php",
                type: "POST",
                data: {
                    state_id: state_id
                },
                cache: false,
                success: function(result){
            $("#city").html(result);
            }
            });
            });
            });
        </script>
    
</body>
</html>