<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
    $id=$_GET['id'];
    $table=$_GET['table'];
    try{
    $conn = $pdo->open();
    $stmt = $conn->prepare("DELETE FROM $table WHERE id=$id");
    $stmt->execute();
    echo '
    <div class="alert alert-success">
  <strong>Success!</strong> The row you selected was deleted.
</div>';
    header("Location: delete.php");
    }
    catch (PDOException $e){
        echo "A connection cannot be established: " . $e->getMessage();
    }
?>