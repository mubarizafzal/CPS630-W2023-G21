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
      <th>Username</th>
      <th>Password</th>
      <th>Name</th>
      <th>Telephone</th>
      <th>Email</th>
      <th>Address</th>
      <th>City Code</th>
      <th>Balance</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $conn = $pdo->open();
      try{
        $stmt = $conn->query("SELECT * FROM user");
        while ($row = $stmt->fetch()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['username'] . "</td>";
          echo "<td>" . $row['password'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['telephone'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['address'] . "</td>";
          echo "<td>" . $row['citycode'] . "</td>";
          echo "<td>" . $row['balance'] . "</td>";
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