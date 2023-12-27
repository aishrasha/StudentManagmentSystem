<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<?php
    require "db.php";
    include 'navbar2.php';
    ?>
    <div class="container">
        <h1 class="mt-3">Update Record</h1>
   
    <form>
        <div class="form-group">
            <p class="text-secondary">Please fill this form and submit to update admission record to database.</p>
            <input type="hidden" name="id" id="id" class="form-control mt-2">
        </div>
        <div class="form-group">
                    <label for="name1" class="mt-2">Name</label>
                    <input type="text" name="name" id="name" class="form-control mt-2" required>
                </div>
                <div class="form-group">
                    <label for="country" class="mt-2">Country</label>
                    <input type="text" name="country" id="country" class="form-control mt-2"required>
                    <option value="">Select Country</option>
                </div>
                <div class="form-group">
                    <label for="state" class="mt-2">State</label>
                    <input type="text" name="state" id="state" class="form-control mt-2"required>
                </div>
                <div class="form-group">
                    <label for="city" class="mt-2">City</label>
                    <input type="text" name="city" id="city" class="form-control mt-2"required>
                </div>
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-outline-success" id="btnadd">Submit</button>
                    <a href="cancel.php" class="btn btn-outline-danger ml-2">Cancel</a>
                </div>
    </form>
   
    </div>
</body>
</html> 






