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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</head>
<body>
<?php
   // require "db.php";
    include 'navbar2.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    if ($_SERVER['REQUEST_METHOD']=="POST"){
        $id = $_POST['id'];
        $countryID = $_POST['country'];
        $stateID = $_POST['state'];
        $cityID = $_POST['city'];
        $userimage=$_FILES['userimage'];
        // print_r($userimage);
        $filename = $userimage['name'];
        $filetmp = $userimage['tmp_name'];
        $fileexn = explode('.',$filename);
        $allowedexn = array('jpg','png','jpeg');
        $filecheck = strtolower(end($fileexn));

        if(in_array($filecheck,$allowedexn)){
            
            $tmpfile = 'images/users/'.$filename;
            move_uploaded_file($filetmp, $tmpfile);
            // // $sql = "UPDATE INTO `users`(`userimage`) VALUES ('$tmpfile');";
            // $result = mysqli_query($con,$sql);
            // $alert = true;
        }
    
    
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
        $sql1 = "update users set name='$name',country='$countryname', state='$statename',city='$cityname', image='$tmpfile' where id='$id'";
       $result = mysqli_query($con,$sql1);
        $successalert = true;
                
        mysqli_close($con);
    }

    
    ?>
    <div class="container">
        <h1 class="mt-3">Update Record</h1>
   
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
                    <select type="text" name="state" id="state" class="form-control mt-2" value="<?php echo $stateID; ?>">
                     </select>
                </div>
                <div class="form-group">
                    <label for="city" class="mt-2">city</label>
                    <select type="text" name="city" id="city" class="form-control mt-2" value="<?php echo $cityID; ?>">
                   </select>
                </div>

                <div class="form-group">
                <label for="userimage" class="mt-2">User Image</label>
                <input class="form-control mt-2" type="file" name="userimage" id="userimage">
            </div>
                
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-outline-info" id="btnadd">Submit</button>
                    <a href="manage.php" class="btn btn-outline-secondary ml-2">Cancel</a>
                </div>
            </form>
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






