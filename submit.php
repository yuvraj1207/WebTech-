<?php

    $nm = $_POST['name'];
    echo "<br>Name entered is: " . $nm;
    
    $date = $_POST['db'];
    echo "<br>Date of birth entered is: " . $date;
    
    $in = $_POST['interests'];
    $interestsList = ""; 

    foreach ($in as $interest)
    {
        $interestsList .= $interest;  
    }
    echo "<br>Having interest in the following fields: " . $interestsList;

    $gender = $_POST['gender'];
    echo "<br>Gender selected is: " . $gender;

    $country = $_POST['country'];
    echo "<br>Country selected is: " . $country;

       
$conn = mysqli_connect("localhost", "root", "", "22co75");
    
if ($conn)
{
    echo "Connected to server successfully";
}
else
{
    echo "Connection failed";
    exit();
}
$conn = mysqli_connect("localhost","root","");
if($conn){
    echo"<br> connected sucessfully";
}
else{
    echo"<br> connection failed";  
    exit();
}
   
?>
