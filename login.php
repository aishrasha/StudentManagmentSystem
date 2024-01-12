<?php
    $login = false;
    $showerror = false;
    $usererror = false;
    $_SESSION['loggedin'] = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include 'db.php';
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);
        $arr = mysqli_fetch_array($res);

        if ($num == 1) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            
           
        }
        if($arr['role']=='admin'){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header('location: home.php');
        }
        if($arr['role']=='admission'){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header('location: admission.php');
        }
        if($arr['role']=='teacher'){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header('location: teacher.php');
        }
        if($arr['role']=='student'){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header('location: student.php');
        }
        else {
            $usererror = true;
            $login = false;
        }
    }
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
    include 'loginNavbar.php';
  
   
    
    if ($showerror) {
        echo "
        <script>
       
            // SweetAlert for login error
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Credentials are entered wrong.'
                
           
            });
        </script>
        ";
    }
    
    if ($usererror) {
        echo "
        <script>
            // SweetAlert for user error
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Role is not assigned to the user yet.'
                 
            });
        </script>
        ";
    }
     
   
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
                    <button type="submit" class="btn btn-outline-info" name="submit">LogIn</button>
                </div>

                </form>

        </div>
      
     

        
</body>
</html>