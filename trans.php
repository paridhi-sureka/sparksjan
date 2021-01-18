<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Tansaction</title>
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="css/styles.css">
</head>
<style>
  table {
  width: 60%;
}
  td, th {
    border: 1px solid #00917c;
    text-align: center;
    padding: 8px;
  }
  h1 {
    text-align: center;
  }

  body {
    text-align: center;
    background-color: #e8efeb;
  }
  .center {
  margin-left: auto;
  margin-right: auto;
}
div
{
  background-color: #cfdac8;
}

</style>

<body>
    <div class="">
<h1>TRANSACTION HISTORY</h1>
</div>
<?php $sql = "SELECT * FROM `trans`"; 
    $result = $conn->query($sql);
?>
<div >
      <button class="btn btn1"><a href="user.php">User List</a></button>
      <button class="btn btn2"><a href="index.php">Home</a></button>
      <button class="btn btn3"><a href="mt.php">Money transfer</a></button>

    </div>
<table class="center">
  <tr>
    <th>Trans Id</th>
    <th>Sender</th>
    <th>Receiver</th>
    <th>Amount</th>
  </tr>
  <?php while($row = mysqli_fetch_array($result)):?>
        
        <tr >
          <td><?php echo $row['Trans Id'];?></td>
          <td> <?php echo $row['Sender'];?></td>
          <td><?php echo $row['Receiver'];?></td>
          <td><?php echo $row['Amount'];?></td>
        </tr>
        <?php endwhile;?>
 
</table>
</body>

</html>
