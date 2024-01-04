<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Record</title>
</head>
<body>
    <?php
      require "db.php";
      include 'navbar2.php';
    ?>
    <div class="container p-3">
            <h1 class="mt-3 text-center">User Details</h1>
           
          <table class="table table-bordered table-stripped">
          <thead>
                        <tr>
                            <td>ID</td>
                            <td>Email</td>
                            <td>Password</td>
                            <td>Image</td>
                           
                        </tr>    
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>aishrashasoni@gmail.com</td>
                            <td>1234</td>
                            <td><img src="" style="height:100px; width: 100px;"></td>
                        </tr>
                    </tbody>
                </table>
                
                </div>
                
    
</body>
</html>