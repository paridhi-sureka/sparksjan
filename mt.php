<?php
include 'connection.php';
?>

<!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>MONEY TRANSFER</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <style>
    h1 {
      text-align: center;
    }

    body {
      background-color: #e8efeb;
    }
    .container {
      text-align: center;
      font-size: 25px;
      padding: 40px;
    }
    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }
    .clearfix {

  border: none;
  color: white;
  padding: 15px 40px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 25px;
}

  </style>

  <body>

    <h1>MONEY TRANSFER</h1>
    <?php $sql = "SELECT * FROM `userlist`"; 
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM `userlist`"; 
    $result1 = $conn->query($sql1);
?>

    <form action="mt.php" style="text-align:center" style="border:10px solid #00917c" method="get">
      <div >
      
      <button class="btn btn1"><a href="user.php">User List</a></button>
      <button class="btn btn2"><a href="trans.php">Transaction History</a></button>
      <button class="btn btn3"><a href="index.php">Home</a></button>

    </div>
    
    <br> <br> <br>
    <label for="name" ><b>Sender</b></label><br><br>
    <select id="sname" name="sname" required>
<option  name="sname" value="" selected disabled hidden>Select sender name</option>
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<option   value='" . $row['Name'] . "'>" . $row['Name'] . "</option>";
}



?>        
</select><br><br>

    <label for="rname" ><b>Receiver</b></label><br><br>
    <select id="rname" name="rname" required>
<option  name="rname" value="" selected disabled hidden>Select sender name</option>
<?php
while ($row1 = mysqli_fetch_array($result1)) {
    echo "<option   value='" . $row1['Name'] . "'>" . $row1['Name'] . "</option>";
}



?>        
</select><br><br>

    <label for="number" ><b>Amount</b></label><br><br>
    <input type="number" placeholder="Amount" name="amount" size="25" required><br><br>

    <div class="clearfix">
    <input  name="submit" id="submit" onclick="myFunction()" name="" type="submit" value="Proceed">

    </div>
<?php
    if(isset($_GET['submit']))  
{   
  $sname = $_GET['sname'];  
  $rname = $_GET['rname'];  
  $amount = $_GET['amount']; 
  $sql2="SELECT Balance FROM userlist WHERE Name='$sname '";
  $result2=mysqli_query($conn, $sql2); 
  $row2=mysqli_fetch_assoc($result2) ;
  $smoney= $row2['Balance'];
  
  $sql3="SELECT Balance FROM userlist WHERE Name='$rname '";
  $result3=mysqli_query($conn, $sql3); 
  $row3=mysqli_fetch_assoc($result3) ;
  $rmoney= $row3['Balance']; 
  $final=$smoney-$amount;
  $final1=$rmoney+$amount;
  $query = "UPDATE `userlist` SET `Balance`='".$final."' WHERE `Name` = '".$sname."'";
$result2 = mysqli_query($conn, $query);
$query1 = "UPDATE `userlist` SET `Balance`='".$final1."' WHERE `Name` = '".$rname."'";
$result3 = mysqli_query($conn, $query1);
$sql2 = "INSERT INTO trans(`Sender`, `Receiver`, `Amount`) VALUES ('$sname','$rname','$amount')";
$query = mysqli_query($conn, $sql2);
}
?>
  </body>

  </html>
