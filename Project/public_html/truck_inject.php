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
      <th>Item Name</th>
      <th>Availability Code</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $conn = $pdo->open();
      try{
        $stmt = $conn->query("SELECT * FROM truck");
        while ($row = $stmt->fetch()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['item_name'] . "</td>";
          echo "<td>" . $row['avail_code'] . "</td>";
          echo "</tr>";
        }
      }
      catch(PDOException $e){
        echo "A connection cannot be established: " . $e->getMessage();
      }
      $pdo->close();
    ?>
  </tbody>
</table>