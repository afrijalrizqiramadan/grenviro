<?php
include 'koneksi.php';


// Query untuk update kolom 'buzzer' menjadi 0 berdasarkan id_device 1
$sql = "UPDATE data_aktuator SET buzzer = 1 WHERE id_device = 4736757";

if ($conn->query($sql) === TRUE) {
    echo "Record berhasil diupdate";
} else {
    echo "Error updating record: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>