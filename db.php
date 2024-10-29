<?php

$conn = new mysqli('localhost', 'root', '', 'ecochallenge');
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

?>
