<?php
include 'db_connect.php';

// ดึงข้อมูลคิวทั้งหมดจากฐานข้อมูล
$sql = "SELECT * FROM bookings ORDER BY booking_time ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>สถานะคิวร้านกาแฟ</title>
</head>
<body style="font-family: sans-serif; padding: 30px;">
  <h2>📋 สถานะคิวร้านกาแฟ</h2>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr style="background-color: #eee;">
      <th>ลำดับ</th>
      <th>ชื่อ</th>
      <th>เบอร์โทร</th>
      <th>เวลาที่จอง</th>
      <th>เวลาที่บันทึก</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
      $i = 1;
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $i++ . "</td>";
        echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
        echo "<td>" . htmlspecialchars($row['booking_time']) . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>ยังไม่มีการจองคิว</td></tr>";
    }
    ?>
  </table>

  <br>
  <a href="register.php">➕ จองคิวใหม่</a>
</body>
</html>
