<?php
include 'db_connect.php';

$type = $_POST['type'];
$brand = $_POST['brand'];
$purchase_date = $_POST['purchase_date'];
$hours_used = $_POST['hours_used'];

$sql = "INSERT INTO equipment (type, brand, purchase_date, hours_used)
        VALUES ('$type', '$brand', '$purchase_date', $hours_used)";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Equipment Result</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.75)),
        url('https://png.pngtree.com/thumb_back/fh260/background/20230411/pngtree-old-mine-tunnel-mining-cave-photo-image_2298268.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #fff;
    }

    .message-box {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      padding: 40px;
      border-radius: 16px;
      text-align: center;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
      max-width: 400px;
    }

    .message-box h2 {
      font-size: 1.5rem;
      margin-bottom: 15px;
    }

    .message-box a {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      padding: 10px 18px;
      background: #1abc9c;
      color: #fff;
      border-radius: 30px;
      font-weight: bold;
      transition: background 0.3s;
    }

    .message-box a:hover {
      background: #16a085;
    }
  </style>
</head>
<body>
  <div class="message-box">
    <?php
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Equipment added successfully!</h2>";
    } else {
        echo "<h2> Error: " . $conn->error . "</h2>";
    }
    $conn->close();
    ?>
    <a href="../index.html">Return Home</a>
  </div>
</body>
</html>
