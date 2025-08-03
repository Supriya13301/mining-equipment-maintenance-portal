<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {     
    $conn = new mysqli("localhost", "root", "", "mining_tracker");     

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }     

    $equipment_id = $_POST["equipment_id"];     
    $service_date = $_POST["service_date"];     
    $notes = $_POST["notes"];     
    $status = $_POST["status"];     

    $sql = "INSERT INTO maintenance (equipment_id, service_date, notes, status)
            VALUES ('$equipment_id', '$service_date', '$notes', '$status')";     

    if ($conn->query($sql) === TRUE) {
        header("Location: schedule_maintenance.php?success=1");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close(); 
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Schedule Maintenance</title>
    <style>
        body {
            background: #222;
            color: #fff;
            font-family: Arial, sans-serif;
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.8)),
                url('https://png.pngtree.com/thumb_back/fh260/background/20230411/pngtree-old-mine-tunnel-mining-cave-photo-image_2298268.jpg');
            background-size: cover;
            background-position: center;
        }
        .form-container {
            max-width: 500px;
            margin: 80px auto;
            background: rgba(0, 0, 0, 0.85);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.6);
        }
        .form-container h2 {
            text-align: center;
            color: #00ffcc;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border-radius: 6px;
            border: none;
            font-size: 16px;
        }
        .btn {
            margin-top: 20px;
            padding: 12px;
            background-color: #00cc99;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            width: 100%;
        }
        .btn:hover {
            background-color: #009977;
        }
        .success {
            background-color: #2ecc71;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Schedule Maintenance</h2>

    <?php if (isset($_GET['success'])): ?>
        <div class="success">✅ Maintenance scheduled successfully.</div>
    <?php endif; ?>

    <form method="POST" action="schedule_maintenance.php">
        <label for="equipment_id">Select Equipment:</label>
        <select name="equipment_id" required>
            <option value="">-- Select Equipment --</option>
            <?php
            $conn = new mysqli("localhost", "root", "", "mining_tracker");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $equipment_result = $conn->query("SELECT id, type, brand FROM equipment");
            if ($equipment_result->num_rows > 0) {
                while ($row = $equipment_result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['id']} - " . htmlspecialchars($row['type']) . " (" . htmlspecialchars($row['brand']) . ")</option>";
                }
            } else {
                echo "<option value=''>No equipment found</option>";
            }
            $conn->close();
            ?>
        </select>

        <label for="service_date">Maintenance Date:</label>
        <input type="date" name="service_date" required>

        <label for="notes">Notes:</label>
        <textarea name="notes" placeholder="Describe issues or tasks" rows="4" required></textarea>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>

        <button type="submit" class="btn">Schedule Maintenance</button>
    </form>
</div>

</body>
</html>
