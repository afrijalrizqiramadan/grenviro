<!DOCTYPE html>
<html><body>
<?php

include 'koneksi.php';

$sql = "SELECT * FROM data_sensor ORDER BY id_data DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>ID Device</td>        
        <td>Timestamp</td> 
        <td>Tekanan</td> 
        <td>Suhu</td>
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id_data"];
        $row_value1 = $row["id_device"];
        $row_value2 = $row["timestamp"];
        $row_value3 = $row["nilai_gas"]; 
        $row_value4 = $row["nilai_suhu"]; 
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_value1 . '</td> 
                <td>' . $row_value2 . '</td>
                <td>' . $row_value3 . '</td> 
                <td>' . $row_value4 . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>