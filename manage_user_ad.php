<?php
    include 'db.php';
    
    session_start();
    $email = $_SESSION['email'];
    $sql = mysqli_query($con,"SELECT * from users where email='$email'");
    $row = mysqli_fetch_array($sql);
    $role = $row['role'];
    if($_SESSION['loggedin']!="true" || ($_SESSION['loggedin']!=true) || $role!='admission'){
        header("loaction: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Admission Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">   
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
          <a class="login nav-link text-info" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="register nav-link text-info" href="manage_user_ad.php">Manage User</a>
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
  <br><br>
        <div class="container">
            <?php
                $sql = "SELECT * from users where (role='student' OR role='user') ORDER by id ASC;";
                $res = mysqli_query($con,$sql);
                if($res){
                    if(mysqli_num_rows($res)>0){
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
                        while($row = mysqli_fetch_array($res)){
                            echo "<tr>";
						        echo "<td>" . $row['id'] . "</td>";
						        echo "<td>" . $row['email'] . "</td>";
						        echo "<td>" . $row['role'] . "</td>";
                                echo "<td>";
        						echo '<a href="read_admission.php?id='. $row['id'] .'" class="mr-3 btn btn-light" title="View Details" data-toggle="tooltip"><span class="fa fa-eye"></span></a></td>';
                                echo "<td>";
        						echo '<a href="update_admission.php?id='. $row['id'] .'" class="mr-3 btn btn-light" title="Update Details" data-toggle="tooltip"><span class="fa fa-pencil"></span></a></td>';
                                echo "<td>";
                                echo '<a href="javascript:void(0)" title="Change Status" class="delete_btn_ajax btn btn-light ms-1" data-toggle="tooltip"><span class="fas fa-trash"></span></a>';
					        	echo '<input type="hidden" class="delete_id_value" value='.$row["id"].'>';
                                echo '</td>';
                                echo "<td>";	
					        	echo '<a href="javascript:void(0)" title="Change Status" class="student_btn_ajax btn btn-info" data-toggle="tooltip">Change role to Student</a>';
					        	echo '<input type="hidden" class="student_id_value" value='.$row["id"].'>';
                                echo '</td>';
                            echo "<tr>";
                        }
                    echo "</tbody>";                            
                    echo "</table>";
                    mysqli_free_result($res);
                    }
                    else{
                        echo '<div class="alert alert-danger">
                                No Record were Found.
                            </div>';
                    }
                }
                else{
                    echo 'OOPs! something went wrong. please try again later.';
                 }
            mysqli_close($con);
            ?>
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
                </script>
</body>
</html>