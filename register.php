<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title> Register </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="./validation.js"></script>
</head>

<body>
  <?php
  include 'loginNavbar.php';
  ?>
  </br>
  <div class="container p-3 ">
    <h1 style="text-align:center;"> Register as a New User </h1>


    <div class="container">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control mt-2" id="fname"name="fname" placeholder="name">
          <small style="color: red;" id="name_error"></small>
        </div>
        <br>
        <div class="form-group">
          <label for="email-id">Email address</label>
          <input type="email" class="form-control mt-2" id="email"name="email" placeholder="Enter email">
          <small style="color: red;" id="email_error"></small>
        </div>
        </br>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Password">
          <small style="color: red;" id="password_error"></small>
        </div>
        </br>
        <div class="form-group">
          <label for="password">Confirm-Password</label>
          <input type="password" class="form-control mt-2" id="cpassword" name="Confirm-password" placeholder="Password">
          <small style="color: red;" id="cpassword_error"></small>
        </div>
        </br>
        <div class="form-group">
                            <label for="role">role</label>
                            <select class="form-control" id="role" onchange="updateForm()">
                                <option value="student">admin</option>
                                <option value="teacher">user</option>
                            </select>
                        </div> 

        <br><br>
        <button id="submit" type="submit" class="btn btn-primary">Register</button>
      </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // $name = htmlspecialchars($_REQUEST['fname']);
      $name=$_POST['fname'];
      $email = htmlspecialchars($_REQUEST['email']);
      
      $password = htmlspecialchars($_REQUEST['password']);

      $cpassword = htmlspecialchars($_REQUEST['Confirm-password']);
    /*  $role = htmlspecialchars($_REQUEST['role']);
      $additionalField = "";
    if ($role === "student") {
        $additionalField = $_POST["studentField"];
    } elseif ($role === "teacher") {
        $additionalField = $_POST["teacherField"];
    }*/
      if($password == $cpassword) {
      
      $sql = "INSERT into users(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
     $result = mysqli_query($con, $sql);

    if($result){
        echo "<script>alert('user added successfully');</script> ";

       
      }
    }else{
     echo 'password dosent match';
    }
  
    }
  
      $con->close();
    
  ?>
  
</body>

</html>