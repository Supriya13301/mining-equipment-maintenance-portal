<?php
require 'db_connect.php';

$sql = "SELECT e.type, e.brand, m.service_date, m.notes, m.status
        FROM maintenance m
        JOIN equipment e ON m.equipment_id = e.id
        ORDER BY m.service_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Maintenance History</title>
</head>
<body>
  <h2>Maintenance History</h2>
  <table border="1">
    <tr>
      <th>Type</th>
      <th>Brand</th>
      <th>Service Date</th>
      <th>Notes</th>
      <th>Status</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['type']) ?></td>
        <td><?= htmlspecialchars($row['brand']) ?></td>
        <td><?= htmlspecialchars($row['service_date']) ?></td>
        <td><?= htmlspecialchars($row['notes']) ?></td>
        <td><?= htmlspecialchars($row['status']) ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
