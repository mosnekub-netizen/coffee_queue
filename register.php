<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['customer_name'];
  $phone = $_POST['phone'];
  $time = $_POST['booking_time'];

  $sql = "INSERT INTO bookings (customer_name, phone, booking_time) 
          VALUES ('$name', '$phone', '$time')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('จองคิวสำเร็จ!');</script>";
  } else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>จองคิวร้านกาแฟ</title>
</head>
<body style="font-family: sans-serif; padding: 30px;">
  <h2>☕ จองคิวร้านกาแฟ</h2>
  <form method="POST" action="">
    <label>ชื่อ:</label><br>
    <input type="text" name="customer_name" required><br><br>

    <label>เบอร์โทร:</label><br>
    <input type="text" name="phone" required><br><br>

    <label>เวลาที่ต้องการจอง:</label><br>
    <input type="datetime-local" name="booking_time" required><br><br>

    <button type="submit">ยืนยันการจอง</button>
  </form>
</body>
</html>
