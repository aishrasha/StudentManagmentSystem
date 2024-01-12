<?php
include 'navbar2.php';

session_start();
if(($_SESSION['loggedin']!='true') || ($_SESSION['loggedin']!=true)){
    header("location: login.php");
    exit;
}
$id = $email = $password = $userimage = '';
$email = $_SESSION['email'];
include 'db.php';
$sql = "select * from users where email = '$email';";
$res = mysqli_query($con, $sql);
$data = mysqli_fetch_array($res);
$userid = $data['id'];
$password = $data['password'];
$image = isset($data['image']) ? $data['image'] : 'userimage';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<div>
            <h1 class='text-center'>User Details</h1>
            <div class="container">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Email</td>
                            <td>password</td>
                            <td>User Image</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $userid;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $password;?></td>
                            <td><img src="<?php echo $userimage;?>" width="100" height="100"></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

    
</body>
</html>