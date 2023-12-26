
<!--<p>welcome user</p>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<?php
        include 'loginNavbar.php';
        require 'db.php';<!--<p>welcome user</p>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<?php
        //include 'loginNavbar.php';
        //require 'db.php';
        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
          <a class="register nav-link text-info" href="manage.php">Manage User</a>
        </li>
      </ul>
    </div>
  </nav>
        <div class="container">
            <h1 class="mt-3 text-center">Users of Student CRUD System.</h1>

            <table class="table table-striped mt-3">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Yashvi Ratuad</td>
      <td>Yashvi@gmail.com</td>
      <td>user</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Shivani sharma</td>
      <td>Shivani@gmail.com</td>
      <td>user</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Palak sharma</td>
      <td>palak@gmail.com</td>
      <td>user</td>
    </tr>

    <tr>
      <th scope="row">4</th>
      <td>Ayush sharma</td>
      <td>Ayush@gmail.com</td>
      <td>user</td>
    </tr>

    <tr>
      <th scope="row">5</th>
      <td>Shivangi soni</td>
      <td>shivangi@gmail.com</td>
      <td>user</td>
    </tr>

    <tr>
      <th scope="row">6</th>
      <td>Muskan sharma</td>
      <td>muskan@gmail.com</td>
      <td>user</td>
    </tr>

    <tr>
      <th scope="row">7</th>
      <td>Abhishek patidar</td>
      <td>abhishek@gmail.com</td>
      <td>user</td>
    </tr>
  </tbody>
</table>
        </div>
    
</body>
</html>
