<?php
include "db.php";

$sql = "SELECT * FROM services";

// Execute the query and check for errors
$result = $conn->query(query: $sql);

if ($result && $result->num_rows > 0) {
    // Fetch all rows as an associative array
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $data[$i]['role'] = $row['role'];
        $data[$i++]['services'] = implode(',', json_decode($row['selected_services'], true));
    }
    
} else {
    echo "Error or no records found: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Choose Services</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Services Display</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Services</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $i = 1;
                        if (isset($data)) {
                            foreach ($data as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $value['role'] ?></td>
                                    <td><?php echo $value['services'] ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>