<style>
  table {
    border-collapse: collapse;
    width: 100%;
    font-family: Arial, sans-serif;
  }

  thead {
    background-color: #ddd;
  }

  th,
  td {
    padding: 8px;
    border: 1px solid #ddd;
  }
</style>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Truck ID</th>
      <th>Source Code</th>
      <th>Dest Code</th>
      <th>Distance (km)</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
<?php
    $conn = $pdo->open();

    try {
        $stmt = $conn->query("SELECT * FROM trip");

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['truck_id']."</td>";
            echo "<td>".$row['source_code']."</td>";
            echo "<td>".$row['dest_code']."</td>";
            echo "<td>".$row['distance_km']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "A connection cannot be established: ".$e->getMessage();
    }
?>
    </tbody>
</table>