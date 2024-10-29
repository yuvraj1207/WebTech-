<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign 'role' from POST data
    $role = $_POST['role'];

    // Check if 'services1' is set before using it
    $services = isset($_POST['services']) ? json_encode($_POST['services']) : '';

    // echo "<pre>";
    // print_r($_POST);
    // exit;

    // SQL query to insert data into the `services` table
    $sql = "INSERT INTO `services`(`role`, `selected_services`) VALUES('$role', '$services')";  
    
    if ($conn->query($sql) === TRUE) {
        //header("Location: index.php?message=Services added successfully!");
        echo "Services added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Choose Services</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Select Your Services</h1>

      <form action="services.php" method="POST">

      <div class="row mt-5">

      <div class="col">
      <label for="role">Choose Your Role:</label>
          <select class="form-select" id="role" name="role" required>
            <option value="">--Select--</option>
            <option value="ngo">NGO</option>
            <option value="corporate">Corporate</option>
          </select>
      </div>
        <div class="col">
        <label>Select the Services You Want to Opt For:</label><br>
            <input type="checkbox" class="form-check" name="services[]" value="Mentorship Programs" /> Mentorship Programs<br>
            <input type="checkbox" class="form-check" name="services[]" value="Funding Opportunities" /> Funding Opportunities<br>
            <input type="checkbox" class="form-check" name="services[]" value="Workshops and Training" /> Workshops and Training<br>
            <input type="checkbox" class="form-check" name="services[]" value="Prototyping Tools" /> Prototyping Tools<br>
        </div>
      </div>
      <div class="row mt-5 justify-content-center">
        <div class="col-2">
        <input type="submit" class="btn btn-success" value="Submit" name="submit" />
        </div>
      </div>
      </form>
    </div>
  </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>