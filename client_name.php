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
        <th>Start</th>
        <th>Stop</th>
        <th>In Traffic</th>
        <th>Out Traffic</th>
</tr>
</body>
</html>

<?php
    include('connect.php');
    if (isset($_POST["name"]))
    {   
        try
        {
            $name = $_POST["name"];

            $sql = "SELECT name, start, stop, in_traffic, out_traffic FROM seanse INNER JOIN client ON FID_Client = ID_Client WHERE name=:name";
            echo "<h4>Статистика работы в сети: ".$name."</h4>";
            $sth = $dbh->prepare($sql);

            $sth->execute(array(':name' => $name));
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