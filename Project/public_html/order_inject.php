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
      <th>Shopping Cart ID</th>
      <th>Item ID</th>
      <th>Trip ID</th>
      <th>Date Issued</th>
      <th>Date Received</th>
      <th>Total</th>
      <th>Pay Code</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $conn = $pdo->open();
      try{
        $stmt = $conn->query("SELECT * FROM order_placed");
        while ($row = $stmt->fetch()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['user_id'] . "</td>";
          echo "<td>" . $row['shopping_cart_id'] . "</td>";
          echo "<td>" . $row['item_id'] . "</td>";
          echo "<td>" . $row['trip_id'] . "</td>";
          echo "<td>" . $row['date_issued'] . "</td>";
          echo "<td>" . $row['date_received'] . "</td>";
          echo "<td>" . $row['total'] . "</td>";
          echo "<td>" . $row['pay_code'] . "</td>";
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