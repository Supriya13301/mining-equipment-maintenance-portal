<?php
require 'db_connect.php';

$today = date('Y-m-d');
$next_week = date('Y-m-d', strtotime('+7 days'));

$sql = "SELECT e.type, e.brand, m.service_date, m.notes
        FROM maintenance m
        JOIN equipment e ON m.equipment_id = e.id
        WHERE m.service_date BETWEEN ? AND ?
        ORDER BY m.service_date ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $today, $next_week);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upcoming Maintenance Alerts</title>
</head>
<body>
  <h2>Upcoming Maintenance (Next 7 Days)</h2>
  <table border="1">
    <tr>
      <th>Type</th>
      <th>Brand</th>
      <th>Service Date</th>
      <th>Notes</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['type']) ?></td>
        <td><?= htmlspecialchars($row['brand']) ?></td>
        <td><?= htmlspecialchars($row['service_date']) ?></td>
        <td><?= htmlspecialchars($row['notes']) ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
