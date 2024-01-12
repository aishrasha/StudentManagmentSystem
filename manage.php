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
  <title>Manage data</title>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
  <?php
  include 'navbar2.php';
 // require 'db.php';
  ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <div class="container">
    <h1 class="mt-3 text-center">Users of Student CRUD System.</h1>

  </div>
  <br><br>
  <div class="container">
    <?php
    $sql = "SELECT * from users ORDER by id ASC;";
    $res = mysqli_query($con, $sql);
    if ($res) {
      if (mysqli_num_rows($res) > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Email</th>";
        echo "<th>Role</th>";
        echo "<th>View</th>";
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";
        echo "<th>Change Role</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($res)) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['role'] . "</td>";
          echo "<td>";
          echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3 btn btn-light" title="View Details" data-toggle="tooltip"><span class="fa-regular fa-eye"></span></a></td>';
          echo "<td>";
          echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3 btn btn-light" title="Update Details" data-toggle="tooltip"><span class="fa-regular fa-pen-to-square"></span></a></td>';
          echo "<td>";
          echo '<a href="javascript:void(0)" title="Change Status" class="delete_btn_ajax btn btn-light ms-1" data-toggle="tooltip"><span class="fa-solid fa-trash"></span></a>';
          echo '<input type="hidden" class="delete_id_value" value=' . $row["id"] . '>';
          echo '</td>';
          echo '<td>';
          //echo 'Change role to:';
          echo '<a href="javascript:void(0)" title="Change Status" class="student_btn_ajax btn btn-outline-info ms-3 mt-2" data-toggle="tooltip">Student</a>';
          echo '<input type="hidden" class="student_id_value" value='.$row["id"].'>';
          echo '<a href="javascript:void(0)" title="Change Status" class="admission_btn_ajax btn btn-outline-info ms-3 mt-2" data-toggle="tooltip">Admission</a>';
          echo '<input type="hidden" class="teacher_id_value" value='.$row["id"].'>';
          echo '<a href="javascript:void(0)" title="Change Status" class="teacher_btn_ajax btn btn-outline-info ms-3 mt-2" data-toggle="tooltip">Teacher</a>';
          echo '<input type="hidden" class="admission_id_value" value='.$row["id"].'>';
          echo '</td>';
        }
        echo "</tbody>";
        echo "</table>";
        mysqli_free_result($res);
      } else {
        echo '<div class="alert alert-danger">
                                No Record were Found.
                            </div>';
      }
    } else {
      echo 'OOPs! something went wrong. please try again later.';
    }
    mysqli_close($con);
    ?>
  </div>
  <script>
     $(document).ready(function(){
                $('.student_btn_ajax').click(function(e){
                    e.preventDefault();
                    var statusid = $(this).closest("tr").find('.student_id_value').val();
                    swal.fire({
                        title: 'Are you Sure?',
                        text: 'You want to change role.',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#9A2124',
                        confirmButtonColor: '#34A853',
                        confirmButtonText: 'Yes, Change it!'
                    }).then((result)=>{
                        if(result.isConfirmed){
                            $.ajax({
                                type: "POST",
                                url: 'change.php',
                                data:{
                                    "student_btn_set": 1,
                                    "student_id": statusid,
                                },
                                success: function(response) {
                                    console.log("here");
                                    swal.fire(
                                        'Changed!',
                                        'Your status has been changed.',
                                        'success'
                                    ).then((result)=>{
                                        window.location.reload();
                                    });

                                } 
                            });
                        }
                    })
                    });
                });
                $(document).ready(function(){
                $('.admission_btn_ajax').click(function(e){
                    e.preventDefault();
                    var admissionid = $(this).closest("tr").find('.admission_id_value').val();
                    swal.fire({
                        title: 'Are you Sure?',
                        text: 'You want to change role.',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#9A2124',
                        confirmButtonColor: '#34A853',
                        confirmButtonText: 'Yes, Change it!'
                    }).then((result)=>{
                        if(result.isConfirmed){
                            $.ajax({
                                type: "POST",
                                url: 'change.php',
                                data:{
                                    "admission_btn_set": 1,
                                    "admission_id": admissionid,
                                },
                                success: function(response) {
                                    console.log("here");
                                    swal.fire(
                                        'Changed!',
                                        'Your status has been changed.',
                                        'success'
                                    ).then((result)=>{
                                        window.location.reload();
                                    });

                                } 
                            });
                        }
                    })
                    });
                });  
   
                $(document).ready(function(){
                $('.delete_btn_ajax').click(function(e){
                    e.preventDefault();
                    var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                    swal.fire({
                        title: 'Are you Sure?',
                        text: 'You want be able to revert back.',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#9A2124',
                        confirmButtonColor: '#34A853',
                        confirmButtonText: 'Yes, Delete it!'
                    }).then((result)=>{
                        if(result.isConfirmed){
                            $.ajax({
                                type: "POST",
                                url: 'delete.php',
                                data:{
                                    "delete_btn_set": 1,
                                    "delete_id": deleteid,
                                },
                                success: function(response) {
                                    console.log("here");
                                    swal.fire(
                                        'Deleted!',
                                        'Your reocrd has been deleted.',
                                        'success'
                                    ).then((result)=>{
                                        window.location.reload();
                                    });

                                } 
                            });
                        }
                    })
                    });
                });  
                $(document).ready(function(){
                $('.teacher_btn_ajax').click(function(e){
                    e.preventDefault();
                    var teacherid = $(this).closest("tr").find('.teacher_id_value').val();
                    swal.fire({
                        title: 'Are you Sure?',
                        text: 'You want to change role.',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#9A2124',
                        confirmButtonColor: '#34A853',
                        confirmButtonText: 'Yes, Change it!'
                    }).then((result)=>{
                        if(result.isConfirmed){
                            $.ajax({
                                type: "POST",
                                url: 'change.php',
                                data:{
                                    "teacher_btn_set": 1,
                                    "teacher_id": teacherid,
                                },
                                success: function(response) {
                                    console.log("here");
                                    swal.fire(
                                        'Changed!',
                                        'Your status has been changed.',
                                        'success'
                                    ).then((result)=>{
                                        window.location.reload();
                                    });

                                } 
                            });
                        }
                    })
                    });
                });    
                </script>

</body>

</html>