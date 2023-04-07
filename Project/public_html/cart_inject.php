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
      <th>User ID</th>
      <th>Item ID</th>
      <th>Quantity</th>
      <th>Total</th>
      <th>Store Code</th>
    </tr>
    </thead>
    <tbody>
    <?php
      $conn = $pdo->open();
      try{
        $stmt = $conn->query("SELECT * FROM shopping_cart");
        while ($row = $stmt->fetch()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['user_id'] . "</td>";
          echo "<td>" . $row['item_id'] . "</td>";
          echo "<td>" . $row['quantity'] . "</td>";
          echo "<td>" . $row['total'] . "</td>";
          echo "<td>" . $row['store_code'] . "</td>";
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