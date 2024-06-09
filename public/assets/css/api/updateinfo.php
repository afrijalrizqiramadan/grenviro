<?php

include 'koneksi.php';

$api_key_value = "sM@rtCN62o24";
$api_key= $device = $pressure = $lastupdate=$temperature = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $device = test_input($_POST["device"]);
        $uptime = test_input($_POST["uptime"]);
        $memory = test_input($_POST["memory"]);
        $lastupdate = $_POST["lastupdate"];
        $temperature =$_POST["temperature"];
        // Buat query untuk memeriksa apakah id_device ada dalam database
$check_query = "SELECT COUNT(*) AS count FROM device WHERE id_device = '" . $device . "'";
$result = $conn->query($check_query);
if ($result) {
    // Dapatkan jumlah baris dari hasil query
    $row = $result->fetch_assoc();
    $device_count = $row['count'];

    // Periksa apakah id_device ada dalam database
    if ($device_count > 0) {
        // Jika id_device ada, jalankan pernyataan SQL UPDATE
        $sql = "UPDATE device SET uptime = '" . $uptime . "', memory = '" . $memory . "', lastupdate = '" . $lastupdate . "', temperature = '" . $temperature . "' WHERE id_device = '" . $device . "'";

        if ($conn->query($sql) === TRUE) {
            echo "Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Jika id_device tidak ada, berikan pesan kesalahan
        echo "id_device tidak ditemukan dalam database";
    }
} else {
    echo "Error: " . $check_query . "<br>" . $conn->error;
}
$conn->close();
}
else {
    echo "No data posted with HTTP POST.";
}
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
