<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
    include 'loginNavbar.php';
    include 'db.php';
    ?>
  <div class="container mt-3">
            <h1 class="text-center text-secondary">Login into your account</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label class="mt-2 text-info" for="email">Email address</label>
                    <input type="email" name="email" id="email" required class="form-control mt-2">
                </div>
                <div class="form-group">
                    <label class="mt-2 text-info" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control mt-2">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-info">LogIn</button>
                </div>

                </form>

        </div>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = htmlspecialchars($_REQUEST['email']);
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($con, $sql);
       if ($result) {
  
          if ($result->num_rows > 0) {
              
            echo "<script>alert('enter the details');</script> ";
            header('location:home.php');
          } else {
              
             echo "<script>alert('Login successful!');</script> ";
          }
      } else {
        
          echo "Error: " . $con->error;
      }
    }
    


    ?>
     

        
</body>
</html>