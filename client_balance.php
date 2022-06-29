<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LB1</title>
  <link href="style.css" rel="stylesheet">
</head>

<body>
    <table>
    <tr>
        <th>Name</th>
        <th>Login</th>
        <th>Password</th>
        <th>IP</th>
        <th>Balance</th>
</tr>
</body>
</html>

<?php
    include('connect.php');
    if (isset($_POST["balance"]))
    {
        $balance=$_POST["balance"];
        echo "<h4>список клиентов с отрицательным балансом счета:</h4>";
        try
        {
              $sql = "SELECT name, login, password, IP, balance FROM client WHERE balance < 0";
              $sth = $dbh->prepare($sql);
              $sth->execute();

              $table = $sth->fetchAll(PDO::FETCH_NUM);

              foreach ($table as $row)
              {
                  $Name = $row[0];
                  $Start = $row[1];
                  $Stop = $row[2];
                  $In_traffic = $row[3];
                  $Out_Traffic = $row[4];
                  print "<tr> <td>$Name</td> <td>$Start</td> <td>$Stop</td> <td>$In_traffic</td> <td>$Out_Traffic</td> </tr>";
              }
        }
        catch (PDOException $ex)
        {
            print "Error!: " . $ex->getMessage() . "<br/>";
            exit();
        }
    }
?>