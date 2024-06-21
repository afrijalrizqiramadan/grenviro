<?php
include 'koneksi.php';


// Query untuk mengambil nilai kolom 'buzzer' berdasarkan id_device 1
$sql = "SELECT buzzer FROM data_aktuator WHERE id_device = 4736757";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "" . $row["buzzer"];
    }
} else {
    echo "0 results";
}

// Menutup koneksi
$conn->close();
?>