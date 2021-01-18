<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User list</title>
      <link rel="icon" href="favicon.ico">
      <link rel="stylesheet" href="css/styles.css">
  </head>
  <style>
    table {
    width: 80%;
  }
    td, th {
      border: 1px solid #00917c;
      text-align: center;
      padding: 8px;
    }
    h1 {
      text-align: center;
    }
    div
    {
      background-color: #cfdac8;
    }

    body {
      text-align: center;
      background-color: #e8efeb;
    }
    .center {
    margin-left: auto;
    margin-right: auto;
  }
  </style>
  <body>
      <div class="">
    <h1>USER LIST</h1>
    </div>
    <?php $sql = "SELECT * FROM `userlist`"; 
    $result = $conn->query($sql);
?>
    

    <div >
      <button class="btn btn1"><a href="index.php">HOME</a></button>
      <button class="btn btn2"><a href="trans.php">Transaction History</a></button>
      <button class="btn btn3"><a href="mt.php">Money transfer</a></button>

    </div>

    <table  class="center">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Balance</th>
      </tr>
      <?php while($row = mysqli_fetch_array($result)):?>
        
      <tr >
        <td><?php echo $row['Id'];?></td>
        <td> <?php echo $row['Name'];?></td>
        <td><?php echo $row['Email'];?></td>
        <td><?php echo $row['Balance'];?></td>
      </tr>
      <?php endwhile;?>
      
        
    </table>

  </body>
</html>
