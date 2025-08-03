<?php
include('db_connect.php');

$query = "SELECT * FROM equipment";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Equipment</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            margin: 0;
            padding: 40px;
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #f1c40f;
        }

        .equipment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .equipment-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px);
            transition: transform 0.2s ease;
        }

        .equipment-card:hover {
            transform: translateY(-5px);
        }

        .equipment-card h3 {
            margin-top: 0;
            color: #1abc9c;
        }

        .equipment-info {
            margin-top: 10px;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .highlight {
            color: #f39c12;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Equipment Inventory</h2>

    <div class="equipment-grid">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="equipment-card">
                <h3><?= htmlspecialchars($row['type']) ?> - <?= htmlspecialchars($row['brand']) ?></h3>
                <div class="equipment-info">
                    <p><span class="highlight">ID:</span> <?= $row['id'] ?></p>
                    <p><span class="highlight">Purchase Date:</span> <?= $row['purchase_date'] ?></p>
                    <p><span class="highlight">Hours Used:</span> <?= $row['hours_used'] ?> hrs</p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
