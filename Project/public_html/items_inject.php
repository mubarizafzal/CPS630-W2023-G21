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
      <th>Category ID</th>
      <th>Item Name</th>
      <th>Keyword</th>
      <th>Dept Code</th>
      <th>Made In</th>
      <th>Price</th>
      <th>Description</th>
      <th>Code</th>
      <th>Photo</th>
      <th>Counter</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $conn = $pdo->open();
      try{
        $stmt = $conn->query("SELECT * FROM items");
        while ($row = $stmt->fetch()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['category_id'] . "</td>";
          echo "<td>" . $row['item_name'] . "</td>";
          echo "<td>" . $row['keyword'] . "</td>";
          echo "<td>" . $row['dept_code'] . "</td>";
          echo "<td>" . $row['made_in'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo "<td>" . $row['description'] . "</td>";
          echo "<td>" . $row['code'] . "</td>";
          echo "<td>" . $row['photo'] . "</td>";
          echo "<td>" . $row['counter'] . "</td>";
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
