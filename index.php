<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sprint2</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Projekto Valdymas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Darbuotojai <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="projektai.php">Projektai</a>
      </li>
    
    </ul>
  </div>
</nav>


<?php include "connection.php" ?>


<?php 
$sql = "SELECT iddarbuotojai, vardas, projektai,actions FROM darbuotojai";
$result = $conn->query($sql);
print('<table><th>ID</th><th>Name</th><th>projektai</th><th>actions</th>');
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["iddarbuotojai"]." " ."</td><td>" .
    $row["vardas"]. " " ."  </td><td>"  .
    $row["projektai"]. "  </td><td>". 
    $row["actions"].
    '<form  action="update.php" method="">
    <input class="btn btn-info" type="submit" name="submit" value="UPDATE">
    </form>' .
    '
    <form  action="delete.php" method="">
    <input class="btn btn-danger" type="submit" name="submit" value="DELETE">
    </form>' ."<br>";
  
  }
} else {
  echo "0 results";
}

print("</table>");






    function showAll() {
    global $conn;
    $conn = mysqli_connect('localhost', 'root', 'mysql', 'projectsworkers');
        if (!$conn) {
          die("Database conn failed");
        }
      $sql = "SELECT * FROM darbuotojai";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
          die('Query FAILED' . mysqli_error($conn));
      }
      while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['iddarbuotojai'];
        echo "<option value='$id'>$id</option>" ;
        }
    } 



    function delete() {
      if (isset($_POST['submit'])) {
         global $conn;
         $id = $_POST['id'];
      
         $sql = "DELETE FROM darbuotojai ";
         $sql .= "WHERE iddarbuotojai = $id ";
  
         $result = mysqli_query($conn, $sql);
         if (!$result) {
          die('Query FAILED' . mysqli_error($conn));
         } else {
          echo "Record deleted";
          header("Location: index.php");
         }
        }
      }
?>








 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>    
</body>
</html>