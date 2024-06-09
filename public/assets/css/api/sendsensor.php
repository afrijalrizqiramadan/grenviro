<?php

include 'koneksi.php';

$api_key_value = "sM@rtCN62o24";
$api_key= $device = $pressure = $datetime=$temperature = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $device = test_input($_POST["device"]);
        $datetime = $_POST["datetime"];
        $pressure = test_input($_POST["pressure"]);
        $temperature = test_input($_POST["temperature"]);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO data_sensor (id_device, datetime, pressure,temperature)
        VALUES ('" . $device . "', '" . $datetime . "', '" . $pressure . "', '" . $temperature . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Success";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}