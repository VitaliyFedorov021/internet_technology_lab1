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
    if (isset($_POST["start_date"]) and isset($_POST["stop_date"]))
    {
        $start_date=$_POST["start_date"];
        $stop_date=$_POST["stop_date"];
        $time_start_date = strtotime ( $start_date );
        $time_stop_date = strtotime ( $stop_date );
        echo "<h4> Статистика работы в сети с ".date ( 'd-m-Y h:i:s' , $time_start_date )." по ".date ( 'd-m-Y h:i:s' , $time_stop_date )."</h4>";
        try
        {
              $sql = "SELECT `name`, `start`, stop, in_traffic, out_traffic 
              FROM seanse inner join client on FID_Client = ID_Client 
              WHERE `start` BETWEEN :start_date AND :stop_date OR `stop` BETWEEN :start_date AND :stop_date";

              $sth = $dbh->prepare($sql);
              $sth->execute(array(':start_date' => $start_date, ':stop_date' => $stop_date));

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